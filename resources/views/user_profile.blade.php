@if(session('success'))
    <script type="text/javascript">
        window.onload = function () { alert("{{ session('success') }}"); }
    </script>
@endif


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .profile-section, .replies-section {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border: 2px solid #343a40;
            border-radius: 10px;
        }

        .profile-section {
            margin-bottom: 40px;
        }

        .replies-section h2 {
            margin-bottom: 20px;
        }

        .reply {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            border: 2px solid #6c757d;
            border-radius: 8px;
        }

        .reply-topic {
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
            background-color: #343a40;
            color: #fff;
            border-radius: 6px;
        }

        .reply-message {
            display: none;
            padding: 10px;
        }

        .hidden {
            display: none;
        }

        .delete-button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .delete-button:hover {
            background-color: darkred;
        }

/*================================================== footwerrr====================== */
        footer{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    row-gap: 30px;
    background: black;
    color: white;
    padding-block: 40px 60px;
}
.top-footer p{
    font-size: 25px;
    font-weight: 600;
}
.middle-footer .footer-menu{
    display: flex;
}

.footer-social-icons{
    display: flex;
   
    gap: 30px;   
}
.bottom-footer{
    font-size: 14px;
    margin-top: 10px;
}
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const replies = document.querySelectorAll('.reply-topic');

            replies.forEach(topic => {
                topic.addEventListener('click', function() {
                    const allMessages = document.querySelectorAll('.reply-message');
                    const clickedMessage = this.nextElementSibling;

                    allMessages.forEach(message => {
                        if (message !== clickedMessage) {
                            message.style.display = 'none';
                        }
                    });

                    clickedMessage.style.display = clickedMessage.style.display === 'none' || clickedMessage.style.display === '' ? 'block' : 'none';
                });
            });
        });
    </script>
</head>
<body>
    @include('layout.navigation')
<br><br><br><br><br><br>
    <div class="profile-section">
        <h1>User Profile</h1>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>

    <div class="replies-section">
        <h2>Replies</h2>

        <!-- Fetching replies data -->
        <?php
          $replies = App\Models\Reply::where('request_id', $user->id)->get();
        ?>

        @if($replies->isNotEmpty())
            @foreach ($replies->reverse() as $reply)
                <div class="reply">
                    <div class="reply-topic">
                        {{ $reply->topic }}___________{{ $reply->created_at }}
                    </div>
                    <div class="reply-message hidden">
                        <p>{{ $reply->message }}</p>

                        <form method="post" action="{{ route('reply.destroy', ['reply' => $reply->id]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>No replies found.</p>
        @endif
    </div>

    <br><br><br>
                     <!-- --------------- FOOTER --------------- -->
                     <footer>
          <div class="top-footer">
              <p>Abc School</p>
          </div>
          <div class="middle-footer">
            
          </div>
          <div class="footer-social-icons">
              <div class="icon"><i class="uil uil-facebook"></i></div>
              <div class="icon"><i class="uil uil-github-alt"></i></div>
          </div>
          <div class="bottom-footer">
              <p>A <a href="#home" style="text-decoration: none;"> Minhaz  Mahmud </a> - development.</p>
          </div>
       

      </footer>
</body>
</html>
