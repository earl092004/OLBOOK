<x-layouts>
    <form action="{{ route('AddPost')}}" method="post">
        @csrf
        <input type="text" name="Enter details" placeholder="enter details" id="">
        <input type="text" name="data" placeholder="Enter data">
        <button type="submit">Submit</button>
    </form>

</x-layouts>
