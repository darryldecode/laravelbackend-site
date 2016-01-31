<div class="documentation-page-content">
    <h1>BUILD YOUR OWN WIDGET</h1>
    <br>
    <h4>WHAT IS A WIDGET?</h4>
    <p>A widget is a partial view in dashboard that displays a specific set of data.</p>
    <p>When building a custom widget, it will have its own directory, and will have its own files you can deal with to get
        full control of your widget template.</p>
    <br>
    <h4>So let's begin building our first custom widget:</h4>
    <ul>

        <li>
            <p>1.) First thing to do is using our CLI tool: <pre>php artisan backend:widget-create</pre></p>
            <p>After that command, it will ask you three question that look like this:</p>
            <img src="../../resources/images/widget1.png">
            <ul>
                <li><b>WIDGET NAME:</b> The name of your custom widget.</li>
                <li><b>WIDGET DESCRIPTION:</b> The description of your custom widget.</li>
            </ul>
        </li>

        <li>
            <p>2.) After you have completed above instructions, You will see a new space for your widget view in dashboard:</p>
            <img src="../../resources/images/widget2.png">
        </li>

        <li>
            <p>2.) On your <pre>app/Backend/Components</pre> You will also see the folder and files of your new widget.</p>
            <img src="../../resources/images/widget3.png"><br><br>
            <p>You will notice the folder <b>app/Backend/Widgets/EcommerceInsights</b>. That is our new widget. It has its own files that you can work on what ever you want
            to display on its template.</p>
        </li>
    </ul>
</div>