<div class="documentation-page-content">
    <h1>NAVIGATION BUILDER COMPONENT</h1>

    <h3>Build Custom Navigations Easily!</h3>
    <img src="/resources/images/navigation-component.png">

    <h3>QUERYING CUSTOM NAVIGATION FOR FRONT END:</h3>
    <p>The best way to query contents is to use the commands. You can use the raw Eloquent query but its
        more convenient to use the built-in commands for ease of query.</p>

    <h3>Query Navigation By ID:</h3>
    <p>On your controller, you can do this:</p>
<pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\Navigation\Commands\ListCustomNavigationCommand',
    array(
        'id' => 1, // (required) int.
    )
);
$result->isSuccessful(); // check if the command transaction was successful or not
$result->getStatusCode(); // the status code Ex 400,200,201 etc
$result->getData(); // the data or set of results
$result->getMessage(); // the message (success or error)
</code></pre>

    <div class="alert alert-warning">
        More documentation coming soon.
    </div>
</div>