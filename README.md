# Git Operations Demo with PHP

This repository demonstrates different Git operations (merge, rebase, squash) using PHP code examples.

## Project Structure

This is a simple PHP application that manages a basic user system.

## Branches Overview

- `main` - Main development branch
- `feature/user-authentication` - Demonstrates merge operations
- `feature/user-profile` - Demonstrates rebase operations  
- `feature/user-validation` - Demonstrates squash operations
- `hotfix/security-patch` - Demonstrates fast-forward merge

## Git Operations Demonstrated

### 1. Merge Operations
- **Fast-forward merge**: When the target branch hasn't diverged
- **Three-way merge**: When both branches have new commits

### 2. Rebase Operations
- **Regular rebase**: Replays commits on top of another branch
- **Interactive rebase**: Allows editing, squashing, reordering commits

### 3. Squash Operations
- **Squash merge**: Combines all commits from a branch into a single commit
- **Interactive rebase squash**: Combines multiple commits during rebase

## How to Follow Along

1. Check out different branches to see the code changes
2. Use `git log --oneline --graph --all` to visualize the commit history
3. Compare the different approaches and their resulting commit histories

## Commands Used

```bash
# Merge operations
git merge feature/user-authentication
git merge --no-ff feature/branch-name

# Rebase operations  
git rebase main
git rebase -i HEAD~3

# Squash operations
git merge --squash feature/branch-name
git rebase -i HEAD~3  # then choose 'squash' for commits
```

## Files in this Demo

- `User.php` - Main User class
- `UserValidator.php` - User validation logic
- `UserAuth.php` - Authentication system
- `config.php` - Configuration file
