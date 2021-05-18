@php $editing = isset($busSchedule) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.datetime
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($busSchedule->date)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="bus_id" label="Bus Id">
            @php $selected = old('bus_id', ($editing ? $busSchedule->bus_id : '')) @endphp
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="bus_route_id" label="Bus Route Id">
            @php $selected = old('bus_route_id', ($editing ? $busSchedule->bus_route_id : '')) @endphp
        </x-inputs.select>
    </x-inputs.group>
</div>
