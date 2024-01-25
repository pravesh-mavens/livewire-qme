<div>
    {{$product['name']}}
    @if(isset($product['variant_option']) && !empty($product['variant_option']))
        CUSTOMIZE
    @endif

    <ul>
        <li>
            <a role="tab" aria-controls="home" aria-selected="false">Add Product Profit</a>
        </li>
        <li>
            <a role="tab" aria-controls="profile" aria-selected="false">Add Install Rate</a>
        </li>
        <li>
            <a role="tab" aria-controls="contact" aria-selected="false">Add Tax</a>
        </li>
    </ul>
</div>
