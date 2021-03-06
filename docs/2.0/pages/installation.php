<div class="documentation-page-content">
    <h3>REQUIREMENTS:</h3>
    <ul>
        <li>PHP >= 5.5.9</li>
        <li>Laravel 5.2.x</li>
    </ul>

    <h3>INSTALLATION GUIDE:</h3>
    <div class="alert alert-info">
        <h2><i class="fa fa-warning"></i> IMPORTANT!</h2>
        <ul>
            <li>Preferred a fresh install of laravel 5.1 application.</li>
            <li>Make sure to set all your database connection first.</li>
            <li>Make sure to set correct "url" on config/app.php</li>
        </ul>
    </div>
    <ul id="installation-steps">

        <li class="installation-step">
            <h4>STEP 1:</h4>
            <pre>
composer require darryldecode/laravelbackend:~2.0
            </pre>
        </li>

        <li class="installation-step">
            <h4>STEP 2:</h4>
            <p>add this lines in config/app.php on providers array:</p>
            <pre><code data-language="php">
Darryldecode\Backend\BackendServiceProvider::class,
Darryldecode\Backend\BackendRoutesServiceProvider::class,
            </code></pre>
            <p>add this lines in config/app.php on aliases array:</p>
            <pre><code data-language="php">
'Form' => Illuminate\Html\FormFacade::class,
'Html' => Illuminate\Html\HtmlFacade::class,
            </code></pre>
        </li>

        <li class="installation-step">
            <h4>STEP 3:</h4>
            <div class="well well-sm">
               <b><i class="fa fa-warning"></i>NOTE:</b> Delete all default migration first bundled with your laravel installation. Backend package has its own full-blown user component. After you have deleted it, do this on your command line:
            </div>
            <pre><code data-language="php">php artisan vendor:publish --provider="Darryldecode\Backend\BackendServiceProvider"</code></pre>
            <p>Then do:</p>
            <pre>composer dump-autoload</pre>
        </li>

        <li class="installation-step">
            <h4>STEP 4:</h4>
            <p>On your terminal, do:</p>
            <pre><code data-language="php">
php artisan migrate
php artisan db:seed --class=BackendSeeder
            </code></pre>
        </li>

        <li class="installation-step">
            <h4>STEP 5:</h4>
            <p>on config/auth.php (changed your users model to:)</p>
            <pre><code data-language="php">
'providers' => [
    'users' => [
    'driver' => 'eloquent',
    'model' => Darryldecode\Backend\Components\User\Models\User::class, // <---- change to this
],
                </code></pre>
            <p>on config/auth.php (changed your passwords.users.email value to: "backend.auth.email-link")</p>
            <pre><code data-language="php">
'passwords' => [
    'users' => [
        'provider' => 'users',
        'email' => 'backend.auth.email-link', // <---- change to this
        'table' => 'password_resets',
        'expire' => 60,
    ],
],
                </code></pre>
            <p>on config/filesystems.php (changed the local disks:)</p>
            <pre><code data-language="php">
'root'   => storage_path('app'),
to:
'root'   => public_path('uploads'),
                </code></pre>
            <p>on app/Console/Kernel.php (add this on the $commands property array, this will enable package's built in consoles)</p>
            <pre><code data-language="php">
\Darryldecode\Backend\Base\Console\ComponentMake::class,
\Darryldecode\Backend\Base\Console\WidgetMake::class
                </code></pre>
        </li>
        <li class="installation-step">
            <h4>CONRGATULATIONS! Your instant laravel 5.1 backend is ready!</h4>
            <p>You can now login to your backend installation: <pre>youdomain.com/backend/login</pre></p>
            <ul>
                <li>User: admin@gmail.com</li>
                <li>Pass: admin</li>
            </ul>
            <div class="alert alert-danger">
                Please change your credentials. You can also change your backend url on config.
            </div>
        </li>
    </ul>
    <h1>VIDEO INSTALLATION TUTORIAL:</h1>
    <div class="video-hold">
        <iframe src="https://drive.google.com/file/d/0B9dCEjZYeYd6NXJUcUc2YW11Zms/preview" width="640" height="480"></iframe>
    </div>
</div>

<div class="alert alert-warning">
    More documentation coming soon or you may help us improve the docs by making pull request here: <a target="_blank" href="https://github.com/darryldecode/laravelbackend-site">https://github.com/darryldecode/laravelbackend-site</a>
</div>