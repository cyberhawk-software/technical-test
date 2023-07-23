@include('components.header')
<main>

    <div class="header">
        <h1>Dashboard</h1>
    </div>
    <table>
        <tr>
            <th>Name</th>
            <th>Postcode</th>
            <th>Last Update</th>
            <th></th>
        </tr>
        @foreach ($table as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['postcode'] }}</td>
                <td>{{ $item['updated_at'] }}</td>
                <td>
                    <a href="/component/{{ $item['id'] }}"><img src="/images/edit.png" alt="edit"></a>
                    <button data-object="location" data-id='{{ $item['id'] }}' class="delete"><img src="/images/trash.png"
                            alt="trash"></button>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="button-div">
        <button data-action="open" data-modal="add-modal" class="button green">+ Add New
            Location</button>
    </div>
</main>

<div class="modal" id="add-modal">
    <div class="modal__inner add-location">
        <div data-action="close" data-modal="add-modal" class="modal__close"></div>
        <div class="modal__inner-header">
            <h2>Add Location</h2>
        </div>
        <div class="modal__inner-input">
            <input type="name" name="name" placeholder="Name">
            <input type="postcode" name="postcode" placeholder="Postcode">
        </div>
        <div class="modal__inner-footer">
            <div class="button green submit">Add</div>
        </div>
    </div>
</div>




@include('components.footer')
