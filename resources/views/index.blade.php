<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <style>
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 10px;
        }
        .user-container {
            display: flex;
            flex-wrap: wrap;
        }
        .user {
            text-align: center;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>User Profiles</h1>

    <div class="user-container">
        @foreach($users as $user)
            <div class="user">
                <img src="{{ $user->profile_picture }}" alt="{{ $user->name }}'s Profile Picture" class="profile-pic">
                <p>{{ $user->name }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>
