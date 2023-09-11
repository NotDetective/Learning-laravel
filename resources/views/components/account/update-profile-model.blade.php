@props(['modelId', 'user'])

<x-model :modelId="$modelId">
    <div class="sm:flex sm:items-start">
        <div
            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
            <img src="../../img/edit-icon.svg" alt="edit-icon">
        </div>
        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
            <x-form :action="route('account.updateProfile' , $user->id)" method="PATCH" id="updateProfile">
                <x-form.file title="Profile Image" name="image" />
            </x-form>
        </div>
    </div>
    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
        <button type="submit" form="updateProfile"
                class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto">
            update
        </button>
        <button onclick="closeModel('{{$modelId}}')"
                type="button"
                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
            Cancel
        </button>
    </div>
</x-model>
