<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $class->class_name }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col sm:justify-center items-center">
        <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mt-4">
                <h1 style="float: right;font-weight: 900;">Classe code: {{ $class->class_code }}</h1>
                @if(Auth::user()->level == 'teacher')
                    <h1>Students</h1>
                @else
                    <h1>Classmates</h1>
                @endif
                
                <table style="width:100%">
                    <thead>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        @if(Auth::user()->level == 'teacher')
                            <th>Action</th>
                        @endif
                    </thead>
                    @foreach($classMembers as $member)
                        <tr align="center">
                            <td>
                                {{ $member->fname }}
                            </td>
                            <td></td>
                            <td>{{ $member->lname }}</td>
                            @if(Auth::user()->level == 'teacher')
                                <td><a href="{{ route('classes.unenroll', $member->id) }}" style="color:red">Remove</a></td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
