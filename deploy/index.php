<?php
$repo_dir = '/home/twtestsite';
$web_root_dir = '/home/twtestsite';

// Full path to git binary is required if git is not in your PHP user's path. Otherwise just use 'git'.
$git_bin_path = 'git';

  // Do a git checkout to the web root
  echo exec('cd ' . $repo_dir . ' && git reset --hard HEAD');
  echo exec('cd ' . $repo_dir . ' && git pull');
  echo exec('cd ' . $repo_dir . ' && GIT_WORK_TREE=' . $web_root_dir . ' ' . $git_bin_path  . ' checkout -f');

  // Log the deployment
  $commit_hash = shell_exec('cd ' . $repo_dir . ' && ' . $git_bin_path  . ' rev-parse --short HEAD');
  file_put_contents('deploy.log', date('m/d/Y h:i:s a') . " Deployed branch: " .  $branch . " Commit: " . $commit_hash . "\n", FILE_APPEND);
?>
