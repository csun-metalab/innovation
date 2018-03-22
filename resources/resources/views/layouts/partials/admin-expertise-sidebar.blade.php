<nav class="bs-docs-sidebar">
    <ul class="nav nav-stacked sidebar">
        <li class="{{ setActive(['admin/expertise','admin/expertise/*']) }}">
            <a title="Expertise" href="{{ url('admin/expertise') }}">Expertise</a>
        </li>
        <li class="{{ setActive(['admin/sub-categories','admin/sub-categories/*']) }}">
            <a title="Sub-Categories" href="{{ url('admin/sub-categories') }}">Sub-Categories</a>
        </li>
        <li class="{{ setActive(['admin/categories','admin/categories/*']) }}">
            <a title="Categories" href="{{ url('admin/categories') }}">Categories</a>
        </li>
    </ul>
</nav>