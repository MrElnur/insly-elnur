<div class="navbar navbar-dark bg-primary">
    <div class="navbar-inner">
        <ul class="nav">

            <li class="{{ (request()->is('/')) ? 'current_page_item' : '' }}"> <a href="/">Home</a></li>
            <li class="{{ (request()->is('/calculator')) ? 'current_page_item' : '' }}"> <a href="/calculator">Calculator</a></li>
            <li class="{{ (request()->is('/binaryString')) ? 'current_page_item' : '' }}"> <a href="/binaryString">Name</a></li>
            <li class="{{ (request()->is('/source')) ? 'current_page_item' : '' }}"> <a href="/source">SourceCode</a></li>
        </ul>
    </div>
</div>
