<div class="documentation-page-content">
    <h1>AUTHENTICATION COMPONENT</h1>

    <h3>API:</h3>
    <p>The best way to authenticate is to use the commands. You can use the raw Eloquent but its
        more convenient to use the built-in commands for ease of use.</p>

    <h3>Authenticating a user:</h3>
    <p>On your controller, you can do this:</p>
<pre><code data-language="php">
// NOTE:
// Throttling feature is enabled by default

$result = $this->dispatchFromArray(
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

    <h3>Built-in Middleware:</h3>
    <p>On your controller:</p>
<pre><code data-language="php">
// if you want it for authenticated users only
$this->middleware('backend.authenticated');

// if you want it for non-authenticated users only
$this->middleware('backend.guest');
</code></pre>

    <div class="alert alert-warning">
        More documentation coming soon.
    </div>
</div>