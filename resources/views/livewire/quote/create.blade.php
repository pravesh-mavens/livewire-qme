<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-6">
        <h2 class="title-page">New Quote</h2>
    </div>
    <div class="col-lg-6">
        <a href="javascript:void(0)" wire:click="back" class="btn btn-success btn-sm pull-right m-t-md">Back</a>
    </div>

    <style>
        .error,.border-red{
            border-color:1px red;
            color: red;
        }
    </style>

    <form wire:submit='save'>
        <x-forms.input name="title" type="text" wire:model.blur="title" /> 
    
        <x-forms.input name="content" type="text" wire:model.blur="content" /> 
    
        <button type="submit">Save
        <div wire:loading>
            Form Submiting
        </div>
        </button>
    </form>
</div>
