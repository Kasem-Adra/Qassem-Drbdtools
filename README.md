# DRBDtools by Qassem

[![Tests](https://github.com/Kasem-Adra/Qassem-Drbdtools/actions/workflows/tests.yml/badge.svg)](https://github.com/Kasem-Adra/Qassem-Drbdtools/actions/workflows/tests.yml)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)
[![Python](https://img.shields.io/badge/Python-3.10%2B-blue.svg)](https://www.python.org/)

Professional DRBD management and Linux infrastructure toolkit by **Kasem Adra**.

## Overview

**DRBDtools by Qassem** provides a clean command-line interface for DRBD operations, Linux infrastructure automation, validation, and future cluster-management workflows.

> Repository: `Qassem-Drbdtools`  
> CLI command: `qdrbd`

## Features

- Modern Python package structure
- `qdrbd` command-line interface
- Safe `--dry-run` mode
- DRBD resource validation
- MIT licensed
- Docker-ready
- GitHub Actions CI
- Unit-test structure
- Legacy script archive included

## Installation

```bash
git clone https://github.com/Kasem-Adra/Qassem-Drbdtools.git
cd Qassem-Drbdtools
python -m pip install -e .
```

## Usage

```bash
qdrbd status r0
qdrbd repair r0 --mode master --dry-run
qdrbd force-sync r0 --mode slave --dry-run
```

## Development

```bash
python -m pip install -e ".[dev]"
pytest
```

## Project Structure

```text
Qassem-Drbdtools/
├── qdrbdtools/              # Main Python package
├── tests/                   # Unit tests
├── docs/                    # Documentation
├── examples/                # Usage examples
├── legacy/                  # Original scripts kept for reference
├── .github/workflows/       # CI pipelines
├── Dockerfile
├── pyproject.toml
├── LICENSE
└── README.md
```

## Documentation

See:

- [Architecture](docs/ARCHITECTURE.md)
- [Usage Guide](docs/USAGE.md)
- [Security Notes](docs/SECURITY.md)

## License

This project is licensed under the MIT License.
