import os
import subprocess

# 获取当前目录路径
current_dir = os.getcwd()

# 打印输出当前目录路径
print(f"current dir: {current_dir}")

# 构建 Docker 镜像
build_command = [
    "docker",
    "build",
    "-t",
    "apiswoole:v1",
    "./"
]
subprocess.run(build_command, check=True)

# 运行 Docker 容器
run_command = [
    "docker",
    "run",
    "-itd",
    "-p", "9500:9500",
    "-p", "9501:9501",
    "-p", "9502:9502/udp",
    "-p", "9503:9503",
    "--name", "apiswoole-1",
    "-v", f"{current_dir}:/var/www/html",
    "apiswoole:v1"
]
subprocess.run(run_command, check=True)
