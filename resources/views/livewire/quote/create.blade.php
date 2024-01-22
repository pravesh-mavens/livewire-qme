<div class="row wrapper border-bottom white-bg page-heading">
    <style>
        .-z-1 {
            z-index: -1;
        }

        .origin-0 {
            transform-origin: 0%;
        }

        input:focus ~ label,
        input:not(:placeholder-shown) ~ label,
        textarea:focus ~ label,
        textarea:not(:placeholder-shown) ~ label,
        select:focus ~ label,
        select:not([value='']):valid ~ label {
            /* @apply transform; scale-75; -translate-y-6; */
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate))
            skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            --tw-scale-x: 0.75;
            --tw-scale-y: 0.75;
            --tw-translate-y: -1.5rem;
        }

        input:focus ~ label,
        select:focus ~ label {
            /* @apply text-black; left-0; */
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity));
            left: 0px;
        }

        .error,.border-red{
            border-color:1px red;
            color: red;
        }
    </style>
    <div class="grid grid-cols-1 gap-4">
        <h2 class="title-page">New Quote</h2>
        <a href="javascript:void(0)" wire:click="back" class="col-start-2 btn btn-success btn-sm pull-right m-t-md">Back</a>
    </div>

    <form wire:submit='save'>
        {{-- Form Feilds --}}
        <div class="flex">
            <div class="relative w-1/3 z-0 w-1/3 m-2">
                <x-forms.input type="text" wire:model.change="title" name="title" placeholder=" "/>
                <x-forms.label text="Project Name" for="title" />
            </div>
        </div>
        <div class="flex">
            <div class="relative w-1/3 z-0 m-2">
                <x-forms.input type="text" wire:model.change="name" name="name" placeholder=" "/>
                <x-forms.label text="Customer Name" for="name" />
            </div>
            <div class="relative w-1/3 z-0 m-2">
                <x-forms.input type="text" wire:model.change="email" name="email" placeholder=" "/>
                <x-forms.label text="Customer Email" for="email" />
            </div>
            <div class="relative w-1/3 z-0 m-2">
                <x-forms.input type="text" wire:model.change="phone" name="phone" placeholder=" "/>
                <x-forms.label text="Customer Phone" for="phone" />
            </div>
        </div>
        <div class="flex">
            <div class="relative w-1/2 z-0 m-2">
                <x-forms.input type="text" wire:model.change="street1" name="street1" placeholder=" "/>
                <x-forms.label text="Street 1" for="street1" />
            </div>
            <div class="relative w-1/2 z-0 m-2">
                <x-forms.input type="text" wire:model.change="street2" name="street2" placeholder=" " />
                <x-forms.label text="Street 2" for="street2" />
            </div>
        </div>
        <div class="flex">
            <div class="relative w-1/4 z-0 m-2">
                <x-forms.input type="text" wire:model.change="city" name="city" placeholder=" "/>
                <x-forms.label text="City" for="city" />
            </div>
            <div class="relative w-1/4 z-0 m-2">
                <x-forms.input type="text" wire:model.change="state" name="state" placeholder=" "/>
                <x-forms.label text="State" for="state" />
            </div>
            <div class="relative w-1/4 z-0 m-2">
                <x-forms.input type="text" wire:model.change="pincode" name="pincode" placeholder=" "/>
                <x-forms.label text="Pin Code" for="pincode" />
            </div>
            <div class="relative w-1/4 z-0 m-2">
                <x-forms.input type="text" wire:model.change="country" name="country" placeholder=" " readonly/>
                <x-forms.label text="Country" for="country" />
            </div>
        </div>

        {{-- Table Feilds --}}
        <div class="flex m-5">
            <x-table.table class="w-full">
                <x-table.thead>
                    <x-table.tr>
                        <x-table.th>Qty</x-table.th>
                        <x-table.th>Image</x-table.th>
                        <x-table.th>Description</x-table.th>
                        <x-table.th>Rate</x-table.th>
                        <x-table.th>Total</x-table.th>
                        <x-table.th></x-table.th>
                    </x-table.tr>
                </x-table.thead>
                <x-table.tbody>
                    <x-table.tr>
                        <x-table.td class="w-20">
                            <x-forms.input type="number" name="qty[]" value="1"/>
                        </x-table.td>
                        <x-table.td class="w-1/6"></x-table.td>
                        <x-table.td class="w-3/5"></x-table.td>
                        <x-table.td>$0.00</x-table.td>
                        <x-table.td>$0.00</x-table.td>
                        <x-table.td class="w-10"></x-table.td>
                    </x-table.tr>
                </x-table.tbody>
            </x-table.table>
        </div>

        {{-- Addition Feilds --}}
        <div class="flex">
            <div class="relative w-full z-0 m-2">
                <x-forms.textarea wire:model.change="paymentterm" name="paymentterm" placeholder=" " rows="5"/>
                <x-forms.label text="Payment Term" for="paymentterm" />
            </div>
        </div>
        <div class="flex">
            <div class="relative w-full z-0 m-2">
                <x-forms.textarea wire:model.change="termcondition" name="termcondition" placeholder=" " rows="5"/>
                <x-forms.label text="Term Condition" for="termcondition" />
            </div>
        </div>
    
        <button type="submit" class="rounded-none hover:rounded-lg bg-cyan-200 p-2">
            Save
            <div wire:loading> Form Submiting </div>
        </button>
    </form>
</div>
