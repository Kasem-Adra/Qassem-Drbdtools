from __future__ import annotations

import argparse
from .core import build_commands, run_commands


def build_parser() -> argparse.ArgumentParser:
    parser = argparse.ArgumentParser(
        prog="qdrbd",
        description="DRBDtools by Qassem - DRBD management CLI",
    )
    parser.add_argument("action", choices=["status", "repair", "force-sync"])
    parser.add_argument("resource", help="DRBD resource name, for example: r0")
    parser.add_argument(
        "--mode",
        choices=["master", "slave"],
        default="master",
        help="Functional mode for DRBD operations.",
    )
    parser.add_argument(
        "--dry-run",
        action="store_true",
        help="Print commands without executing them.",
    )
    return parser


def main() -> int:
    parser = build_parser()
    args = parser.parse_args()

    drbd_command = build_commands(args.action, args.resource, args.mode)
    return run_commands(drbd_command.commands, dry_run=args.dry_run)


if __name__ == "__main__":
    raise SystemExit(main())
