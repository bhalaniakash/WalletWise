#!/bin/bash

# Find all .php files (excluding .blade.php files) and rename them to .blade.php
find . -type f -name "*.php" ! -name "*.blade.php" | while read file; do
    mv "$file" "${file%.php}.blade.php"
done

echo "✅ All .php files have been renamed to .blade.php"
