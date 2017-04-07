<div class="documentation-page-content">
    <h1>MEDIA COMPONENT</h1>

    <h3>Manage your files easily with the most popular media manager, elFinder!</h3>
    <img src="/resources/images/media-v2.png">

    <br>
    <br>

    <h3>Configuring Media Rules:</h3>
    <p>Open <pre>app/config/backend/backend.php</pre> and update with your needs</p>
<pre><code data-language="php">
/*
* Media rules
*/
'upload_rules' => array(
    'uploadDeny' => array(),
    'uploadAllow' => array('all'),
    'uploadOrder' => array('deny','allow'),
),
</code></pre>
    <div class="alert alert-warning">
        More documentation coming soon or you may help us improve the docs by making pull request here: <a target="_blank" href="https://github.com/darryldecode/laravelbackend-site">https://github.com/darryldecode/laravelbackend-site</a>
    </div>
</div>