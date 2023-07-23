@include('components.header')
<main>

    <div class="header">
        <h1>{{ $component['name'] }} Inspections</h1>
    </div>
    <table>
        <tr>
            <th>Time Inspection Created</th>
            <th>Grade</th>
            <th></th>
        </tr>
        @foreach ($table as $item)
            <tr>
                <td>{{ $item['created_at'] }}</td>
                <td>{{ $item['grade'] }}</td>
                <td>
                    <button data-object="ComponentInspection" data-id='{{ $item['id'] }}' class="delete"><img
                            src="/images/trash.png" alt="trash"></button>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="button-div">
        <button data-action="open" data-modal="add-modal" class="button green">+ Add New
            Inspection</button>
    </div>
</main>

<div class="modal" id="add-modal">
    <div class="modal__inner add-inspection">
        <div data-action="close" data-modal="add-modal" class="modal__close"></div>
        <div class="modal__inner-header">
            <h2>Add {{ $component['name'] }} Grade</h2>
        </div>
        <div class="modal__inner-input">
            <input hidden type="text" name="component" value="{{ $component['id'] }}">
            <select name="grade">
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
        </div>
        <div class="modal__inner-footer">
            <div class="button green submit">Add</div>
        </div>
    </div>
</div>




@include('components.footer')
