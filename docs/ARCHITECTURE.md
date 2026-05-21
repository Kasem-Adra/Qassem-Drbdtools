# Architecture

DRBDtools by Qassem is structured as a modern Python CLI project.

## Layers

1. `qdrbdtools.cli` handles command-line arguments.
2. `qdrbdtools.core` validates input and builds DRBD command sequences.
3. Tests validate command generation and safety behavior.

Legacy scripts are preserved in `legacy/` for reference and migration.
