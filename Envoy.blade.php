@servers(['web' => 'willchat.wang'])

@task('deploy')
    cd /home/www/willchat
    git pull origin master
@endtask

@task('composer')
    cd /home/www/willchat
    composer update
@endtask
