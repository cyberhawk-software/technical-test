@include('components.header')
<main>

    <div class="header">
        <h1>{{ $location['name'] }} Objects</h1>
        <div data-long="{{ $location['longitude'] }}" data-lat="{{ $location['latitude'] }}" id="map"></div>
    </div>
    <table>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
        @foreach ($table as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>
                    <a href="/object/{{ $item['id'] }}"><img src="/images/edit.png" alt="edit"></a>
                    <button data-object="LocationObject" data-id='{{ $item['id'] }}' class="delete"><img
                            src="/images/trash.png" alt="trash"></button>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="button-div">
        <button data-action="open" data-modal="add-modal" class="button green">+ Add New
            Object</button>
    </div>
</main>

<div class="modal" id="add-modal">
    <div class="modal__inner add-object">
        <div data-action="close" data-modal="add-modal" class="modal__close"></div>
        <div class="modal__inner-header">
            <h2>Add {{ $location['name'] }} Object</h2>
        </div>
        <div class="modal__inner-input">
            <input hidden type="text" name="location" value="{{ $location['id'] }}">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="image" placeholder="Image link">
        </div>
        <div class="modal__inner-footer">
            <div class="button green submit">Add</div>
        </div>
    </div>
</div>




@include('components.footer')
