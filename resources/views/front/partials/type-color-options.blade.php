<option value="red" class="red-text">
    Red
    @foreach ($types as $type)
        <div class="text-dark">
            {{ ($type->color == 'red' ? '(Taken)': '') }}
        </div>
    @endforeach
</option>


<option value="pink" class="pink-text">
    Pink
    @foreach ($types as $type)
        <div class="text-dark">
            {{ ($type->color == 'pink' ? '(Taken)': '') }}
        </div>
    @endforeach
</option>

<option value="purple" class="purple-text">
    Purple
    @foreach ($types as $type)
        <div class="text-dark">
            {{ ($type->color == 'purple' ? '(Taken)': '') }}
        </div>
    @endforeach
</option>
<option value="deep-purple" class="deep-purple-text">Deep-Purple</option>
<option value="indigo" class="indigo-text">Indigo</option>
<option value="blue" class="blue-text">blue</option>
<option value="light-blue" class="light-blue-text">light-blue</option>
<option value="cyan" class="cyan-text">cyan</option>
<option value="teal" class="teal-text">teal</option>
<option value="green" class="green-text">green</option>
<option value="light-green" class="light-green-text">light-green</option>
<option value="lime" class="lime-text">lime</option>
<option value="yellow" class="yellow-text">yellow</option>
<option value="amber" class="amber-text">amber</option>
<option value="orange" class="orange-text">orange</option>
<option value="deep-orange" class="deep-orange-text">deep-orange</option>
<option value="brown" class="brown-text">
    brown
    @foreach ($types as $type)
        <div class="text-dark">
            {{ ($type->color == 'brown' ? '(Taken)': '') }}
        </div>
    @endforeach
</option>
<option value="grey" class="grey-text">grey</option>
<option value="blue-grey" class="blue-grey-text">blue-grey</option>
