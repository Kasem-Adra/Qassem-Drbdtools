from __future__ import annotations

import re
import subprocess
from dataclasses import dataclass
from typing import List


VALID_MODES = {"master", "slave"}


@dataclass(frozen=True)
class DRBDCommand:
    action: str
    resource: str
    mode: str
    commands: List[List[str]]


def validate_resource(resource: str) -> str:
    """Validate a DRBD resource name."""
    if not resource or not re.match(r"^[A-Za-z0-9_.-]+$", resource):
        raise ValueError("Invalid DRBD resource name.")
    return resource


def validate_mode(mode: str) -> str:
    """Validate functional mode."""
    normalized = mode.lower()
    if normalized not in VALID_MODES:
        raise ValueError("Mode must be either 'master' or 'slave'.")
    return normalized


def build_commands(action: str, resource: str, mode: str) -> DRBDCommand:
    """Build safe DRBD command sequences."""
    resource = validate_resource(resource)
    mode = validate_mode(mode)
    action = action.lower().replace("_", "-")

    if action == "status":
        commands = [["drbdadm", "status", resource]]
    elif action == "repair":
        role = "primary" if mode == "master" else "secondary"
        commands = [
            ["drbdadm", role, resource],
            ["drbdadm", "connect", resource],
        ]
    elif action in {"force-sync", "forcesync", "force-synchro"}:
        commands = [
            ["drbdadm", "disconnect", resource],
            ["drbdadm", "--", "--discard-my-data", "connect", resource],
        ]
    else:
        raise ValueError(f"Unsupported action: {action}")

    return DRBDCommand(action=action, resource=resource, mode=mode, commands=commands)


def run_commands(commands: List[List[str]], dry_run: bool = False) -> int:
    """Run commands or print them in dry-run mode."""
    for cmd in commands:
        printable = " ".join(cmd)
        if dry_run:
            print(f"[dry-run] {printable}")
            continue
        print(f"[run] {printable}")
        subprocess.run(cmd, check=True)
    return 0
