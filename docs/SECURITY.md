# Security Notes

- Run DRBD operations only on trusted systems.
- Use `--dry-run` before executing destructive or cluster-impacting commands.
- Resource names are validated to reduce command injection risk.
- Avoid running production DRBD operations without backups and maintenance windows.
