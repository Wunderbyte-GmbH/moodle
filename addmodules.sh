#!/bin/bash

# Ensure we're in the root of the git repository
if [ ! -d ".git" ]; then
  echo "This script must be run from the root of a git repository."
  exit 1
fi

# Function to add a submodule
add_submodule() {
  local submodule_path=$1
  local submodule_url=$2
  git submodule add $submodule_url $submodule_path
}

# Find all directories containing a .git folder
find . -type d -name ".git" | while read git_dir; do
  # Get the directory path of the .git folder
  submodule_dir=$(dirname "$git_dir")
  
  # Skip the main .git directory
  if [ "$submodule_dir" != "." ]; then
    # Extract the URL of the git repository
    submodule_url=$(git -C "$submodule_dir" config --get remote.origin.url)
    
    if [ -z "$submodule_url" ]; then
      echo "No remote URL found for $submodule_dir, skipping..."
      continue
    fi
    
    echo "Adding submodule for $submodule_dir with URL $submodule_url"
    add_submodule $submodule_dir $submodule_url
  fi
done

# Update submodules
git submodule update --init --recursive

