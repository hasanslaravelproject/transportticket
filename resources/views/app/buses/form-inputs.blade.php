@php $editing = isset($bus) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $bus->name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div x-data="imageComponentData()">
            <x-inputs.partials.label
                name="image"
                label="Image"
            ></x-inputs.partials.label
            ><br />

            <img
                :src="imageDataUrl"
                style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc; border-radius: 0.25rem !important;"
            />

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChanged"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="bus_number"
            label="Bus Number"
            value="{{ old('bus_number', ($editing ? $bus->bus_number : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="company_id" label="Company Id">
            @php $selected = old('company_id', ($editing ? $bus->company_id : '')) @endphp
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="seat_class_id" label="Seat Class Id">
            @php $selected = old('seat_class_id', ($editing ? $bus->seat_class_id : '')) @endphp
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="bus_category_id" label="Bus Category Id">
            @php $selected = old('bus_category_id', ($editing ? $bus->bus_category_id : '')) @endphp
        </x-inputs.select>
    </x-inputs.group>
</div>

@push('scripts')
<script>

    /* Alpine component for image uploader viewer */
    function imageComponentData() {
        return {
            imageDataUrl: '{{ $editing && $bus->image ? \Storage::url($bus->image) : '' }}',

            fileChanged(event) {
                fileToDataUrl(event, src => this.imageDataUrl = src)
            }
        }
    }
</script>
@endpush
