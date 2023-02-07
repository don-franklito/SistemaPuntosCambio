import re

deprecated_functions = ["import"]

def check_for_deprecated_functions(file_path):
    with open(file_path, "r") as f:
        lines = f.readlines()

    for i, line in enumerate(lines):
        for function in deprecated_functions:
            if function in line:
                print(f"Line {i + 1}: {line.strip()} contains deprecated function {function}")

check_for_deprecated_functions("C:/Users/Calam/Documents/DW/Videogames/frontend/src/components/Card.jsx")
