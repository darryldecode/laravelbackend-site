<div class="documentation-page-content">
    <h1>AUTHENTICATION COMPONENT</h1>

    <h3>API:</h3>
    <p>The best way to authenticate is to use the commands. You can use the raw Eloquent but its
        more convenient to use the built-in commands for ease of use.</p>

    <h3>Authenticating a user:</h3>
    <p>On your controller:</p>
<pre><code data-language="php">
// NOTE:
// Throttling feature is enabled by default

$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\Auth\Commands\AuthenticateCommand',
    array(
        'email' => 'admin@gmail.com',
        'password' => 'admin'
    )
);

// if authentication is good
if( $result->isSuccessful() )
{
    // redirect to admin dashboard or any route you want
    // you may use Darryldecode\Backend\Utility\Helpers get get dashboard route
    return redirect()->intended(Helpers::getDashboardRoute());
}
else
{
    // if authentication fails
    return redirect()->back()->withInput(array(
        'email' => 'admin@gmail.com',
        'password' => 'admin'
    ))->withErrors(array('errors' => $result->getMessage()));
}

// Some useful methods
$result->isSuccessful(); // check if authentication was successful
$result->getStatusCode(); // the status code Ex 200, 401
$result->getMessage(); // the message (success or error)
    </code></pre>

    <h3>Logging out a user:</h3>
    <p>You can use the typical logout, On your controller:</p>
<pre><code data-language="php">
Auth::logout();
</code></pre>

    <h3>Built-in Middleware:</h3>
    <p>On your controller:</p>
<pre><code data-language="php">
// if you want it for authenticated users only
$this->middleware('backend.authenticated');

// if you want it for non-authenticated users only
$this->middleware('backend.guest');
</code></pre>

    <h3>Backend Authentication Event Hooks:</h3>
    <table class="table">
        <tr>
            <th>EVENT:</th>
            <th>PARAMETERS PASSED:</th>
            <th>DESCRIPTION:</th>
        </tr>
        <tr>
            <td><pre>backend.auth.success</pre></td>
            <td><b>Param 1</b>: User Object</td>
            <td>This event is triggered after successful authentication on backend and before any redirection.</td>
        </tr>
        <tr>
            <td><pre>backend.auth.logut</pre></td>
            <td><b>Param</b>: N/A</td>
            <td>This event is triggered after successful logout on backend and before any redirection.</td>
        </tr>
    </table>

    <div class="alert alert-warning">
        More documentation coming soon or you may help us improve the docs by making pull request here: <a target="_blank" href="https://github.com/darryldecode/laravelbackend-site">https://github.com/darryldecode/laravelbackend-site</a>
    </div>
</div>