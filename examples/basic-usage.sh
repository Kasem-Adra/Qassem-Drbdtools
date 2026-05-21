#!/usr/bin/env bash
set -e

qdrbd status r0
qdrbd repair r0 --mode master --dry-run
qdrbd force-sync r0 --mode slave --dry-run
