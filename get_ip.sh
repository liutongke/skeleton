#!/bin/bash

# 获取主机 IP 地址
host_ip=$(getent hosts host.docker.internal | awk '{ print $1 }')

echo "Host IP Address: $host_ip"
