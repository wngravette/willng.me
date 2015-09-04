composer_command = "/usr/local/bin/php"
composer_command << " #{release_path}/composer.phar"
composer_command << " --no-dev"
composer_command << " --prefer-source"
composer_command << " --optimize-autoloader"
composer_command << " install"

run "cd #{release_path} && #{composer_command}"
