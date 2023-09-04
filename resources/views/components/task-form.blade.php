@props(['task' => null , 'action' => "#" , 'method' => "POST"])

<x-form method="PATCH" :action="$action">


    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Add task</h2>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <x-form.input -name="title" :task="$task" method="{{$method}}"/>
                <x-task-texterea-field :task="$task" method="{{$method}}"/>
            </div>
        </div>
    </div>
    <button type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        save
    </button>
</x-form>
