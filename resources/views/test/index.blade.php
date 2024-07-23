@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Uzair</h3>
        </div>
        <p><i>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur enim sint quo sed similique quibusdam labore ut fuga iste quia quasi culpa voluptas assumenda non ex corrupti voluptatibus, suscipit praesentium? Cupiditate, ut.</i></p>

        
        <table>
            <tr>
                <th>Field</th>
                <th>Input</th>
            </tr>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" id="name" name="name"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email"></td>
            </tr>
            <tr>
                <td><label for="phone">Phone:</label></td>
                <td><input type="tel" id="phone" name="phone"></td>
            </tr>
             
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
   

    </div>
</div>
@endsection