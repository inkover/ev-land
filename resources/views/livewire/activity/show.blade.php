<div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">URL</th>
                <th class="px-4 py-2">Tick count</th>
                <th class="px-4 py-2">Last tick</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr @if($loop->even)class="bg-grey"@endif>
                    <td class="border px-4 py-2">{{ $item['url'] }}</td>
                    <td class="border px-4 py-2">{{ $item['ticks'] }}</td>
                    <td class="border px-4 py-2">{{ $item['last_tick_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $items->links() }}

</div>
