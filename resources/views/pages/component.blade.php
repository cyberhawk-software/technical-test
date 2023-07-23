@include('components.header')
<main>

    <div class="header">
        <h1>{{ $object['name'] }} Components</h1>
        <img src="{{ $object['image'] }}" alt="{{ $object['name'] }}">
    </div>
    <table>
        <tr>
            <th>Name</th>
            <th>Last Grade</th>
            <th>Last Inspection Date</th>
            <th></th>
        </tr>
        @foreach ($table as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['grade'] }}</td>
                <td>{{ $item['created_at'] }}</td>
                <td>
                    <a href="/inspection/{{ $item['id'] }}"><img src="/images/edit.png" alt="edit"></a>
                    <button data-object="ObjectComponent" data-id='{{ $item['id'] }}' class="delete"><img
                            src="/images/trash.png" alt="trash"></button>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="button-div">
        <button data-action="open" data-modal="add-modal" class="button green">+ Add New
            Component</button>
    </div>
</main>

<div class="modal" id="add-modal">
    <div class="modal__inner add-component">
        <div data-action="close" data-modal="add-modal" class="modal__close"></div>
        <div class="modal__inner-header">
            <h2>Add {{ $object['name'] }} Component</h2>
        </div>
        <div class="modal__inner-input">
            <input hidden type="text" name="object" value="{{ $object['id'] }}">
            <input type="text" name="name" placeholder="name">
        </div>
        <div class="modal__inner-footer">
            <div class="button green submit">Add</div>
        </div>
    </div>
</div>




@include('components.footer')
