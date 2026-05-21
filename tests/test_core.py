import pytest

from qdrbdtools.core import build_commands, validate_mode, validate_resource


def test_validate_resource_accepts_safe_names():
    assert validate_resource("r0") == "r0"
    assert validate_resource("cluster-01") == "cluster-01"


def test_validate_resource_rejects_shell_payload():
    with pytest.raises(ValueError):
        validate_resource("r0;rm -rf /")


def test_validate_mode():
    assert validate_mode("Master") == "master"


def test_build_status_command():
    cmd = build_commands("status", "r0", "master")
    assert cmd.commands == [["drbdadm", "status", "r0"]]


def test_build_force_sync_command():
    cmd = build_commands("force-sync", "r0", "slave")
    assert cmd.commands[0] == ["drbdadm", "disconnect", "r0"]
