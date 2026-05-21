# Usage Guide

## Check status

```bash
qdrbd status r0
```

## Dry-run repair

```bash
qdrbd repair r0 --mode master --dry-run
```

## Dry-run force synchronization

```bash
qdrbd force-sync r0 --mode slave --dry-run
```

Use real DRBD commands only on Linux systems configured with DRBD.
