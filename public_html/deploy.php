
<?php
/** 
  * This script is for easily deploying updates to Github repos to your local server. It $
  * git pull in your repo directory every time an update is pushed to your $BRANCH (confi$
  * 
  * Read more about how to use this script at http://behindcompanies.com/2014/01/a-simple$
  * 
  * INSTRUCTIONS:
  * 1. Edit the variables below
  * 2. Upload this script to your server somewhere it can be publicly accessed
  * 3. Make sure the apache user owns this script (e.g., sudo chown www-data:www-data web$
  * 4. (optional) If the repo already exists on the server, make sure the same apache use$
  *    directory (i.e., sudo chown -R www-data:www-data)
  * 5. Go into your Github Repo > Settings > Service Hooks > WebHook URLs and add the pub$
  *    (e.g., http://example.com/webhook.php)
  *
**/

// Set Variables
$LOCAL_ROOT         = "/home/twtestside/";
$LOCAL_REPO_NAME    = "";
$LOCAL_REPO         = "{$LOCAL_ROOT}/{$LOCAL_REPO_NAME}";

if ($_SERVER['HTTP_X_GITHUB_EVENT'] == 'push') {
  // Only respond to POST requests from Github
  
  if( file_exists($LOCAL_REPO) ) {
    
    // If there is a repo, just run a git pull to grab the latest changes
    shell_exec("cd {$LOCAL_REPO} && git reset --hard HEAD && git pull origin master");
    die("done " . mktime());
  } else {
    
    // If the repo does not exist, exit parent directory
    shell_exec("exit");
    
    die("done " . mktime());
  }
}

?>

