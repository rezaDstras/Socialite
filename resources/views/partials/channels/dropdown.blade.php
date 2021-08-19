<select name="channel_id">
    @foreach($channels as $channel)
        <option value="{{$channel->id}}">{{$channel->title}}</option>
    @endforeach
</select>
