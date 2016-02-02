<div class="documentation-page-content">
    <h1>MEDIA MANAGER COMPONENT</h1>

    <h3>Manage your files easily! Group them painlessly!</h3>
    <img src="/resources/images/media-manager.png">

    <br>
    <br>

    <h3>Configuring Media Thumbnails:</h3>
    <p>Open <pre>app/config/backend/backend.php</pre> and update with your needs</p>
<pre><code data-language="php">
/*
* Media Manager thumbnails
*/
'thumb_sizes' => array(
    'small' => array(150,120),
    'medium' => array(300,200),
    'large' => array(600,450),
),
</code></pre>

    <h3>List files or directories of a specific folder</h3>
<pre><code data-language="php">
    $result = $this->dispatch(new Darryldecode\Backend\Components\MediaManager\Commands\ListCommand(
        '/galleries',
        true
    ));

    $files = $result->getData()['files'];
    $directories = $result->getData()['directories'];
</code></pre>

    <div class="alert alert-warning">
        More documentation coming soon.
    </div>
</div>