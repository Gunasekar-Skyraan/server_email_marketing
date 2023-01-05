function insert_email(Request $request)
    {
        $request->validate([
            'sender_email' => 'required',
        ]);

        $category_id = implode(',',$request->category_id);
        $sub_category_id = implode(',',$request->sub_category_id);

        $user = new SendEmail;
        $user->sender_email = $request->sender_email;
        $user->template_category_id = $request->template_category;

        $user->template_id = $request->template_id; 
        $user->maerketing_name = $request->subject;

        $user->maerketing_short_description = $request->template_body;
        $user->user_count = $request->hidden_user_count;


        $user->category_id	= $category_id;
        $user->sub_category_id	= $sub_category_id;
        $user->user_id = $request->user_count[0];



        $user->filter_age = $request->filter_age;
        $user->filter_gender = $request->filter_gender;
        $user->filter_country= $request->filter_country;
        $user->filter_state= $request->filter_state;
        
        $user->filter_city = $request->filter_city;
        $user->filter_type = $request->check_filter_type ?? '0';

        $explode = implode(',',$request->user_count);
        $implode = explode(',',$explode);
        $EmailUser = EmailUser::whereIn('id',$implode)->get();

        require base_path("vendor/autoload.php");

        $mail = new PHPMailer(true);    

        try 
        {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sekarguna534@gmail.com';
            $mail->Password = 'ynrkmjujejymijtx';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
 
            $mail->setFrom($request->sender_email);

            foreach($EmailUser as $all)
            {
                $mail->addBCC($all->user_email);
            }

            $mail->isHTML(true);
 
            $mail->Subject = $request->subject;
            $mail->Body    = $request->template_body;
  
            if($mail->send()) {
                
                LogActivity::addToLog();
                $user->save();
                return back()->with('message','Mail Send Successfullyyyyyy');
            }else 
            {
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
                
            }

        } 
        
        catch (Exception $e) {
            return back()->with('error','Message could not be sent.');
        }
    }
















    $request->validate([
            'sender_email' => 'required',
        ]);

        $category_id = implode(',',$request->category_id);
        $sub_category_id = implode(',',$request->sub_category_id);

        $user = new SendEmail;
        $user->sender_email = $request->sender_email;
        $user->template_category_id = $request->template_category;

        $user->template_id = $request->template_id; 
        $user->maerketing_name = $request->subject;

        $user->maerketing_short_description = $request->template_body;
        $user->user_count = $request->hidden_user_count;


        $user->category_id	= $category_id;
        $user->sub_category_id	= $sub_category_id;
        $user->user_id = $request->user_count[0];



        $user->filter_age = $request->filter_age;
        $user->filter_gender = $request->filter_gender;
        $user->filter_country= $request->filter_country;
        $user->filter_state= $request->filter_state;
        
        $user->filter_city = $request->filter_city;
        $user->filter_type = $request->check_filter_type ?? '0';

        $explode = implode(',',$request->user_count);
        $implode = explode(',',$explode);
        $EmailUser = EmailUser::whereIn('id',$implode)->get();

        foreach($EmailUser as $all)
        {
            $mail['email'] = $all->user_email; 
            Mail::raw($request->template_body,function ($message)use ($mail) {
                $message->from("sekarguna534@gmail.com");
                $message->to($mail['email'])->subject("Testing Email Marketing");
            });
        }

        LogActivity::addToLog();
        $user->save();
        

        return back()->with('message','Mail Send Successfully');














        function insert_email(Request $request)
    {
        $request->validate([
            'sender_email' => 'required',
        ]);

        $category_id = implode(',',$request->category_id);
        $sub_category_id = implode(',',$request->sub_category_id);

        $user = new SendEmail;


        $user->sender_email = $request->sender_email;
        $user->template_category_id = $request->template_category;

        $user->template_id = $request->template_id; 
        $user->maerketing_name = $request->subject;

        $user->maerketing_short_description = $request->template_body;
        $user->user_count = $request->hidden_user_count;


        $user->category_id	= $category_id;
        $user->sub_category_id	= $sub_category_id;
        $user->user_id = $request->user_count[0];



        $user->filter_age = $request->filter_age;
        $user->filter_gender = $request->filter_gender;
        $user->filter_country= $request->filter_country;
        $user->filter_state= $request->filter_state;
        
        $user->filter_city = $request->filter_city;
        $user->filter_type = $request->check_filter_type ?? '0';

        $subject = $request->subject;
        $body = $request->template_body;
        $sender_email = $request->sender_email;
        $request->subject;
        $explode = implode(',',$request->user_count);
        $implode = explode(',',$explode);
        $EmailUser = EmailUser::whereIn('id',$implode)->get();
        foreach($EmailUser as $all)
        {
            $mail = $all->user_email; 
            Mail::Raw(['html'=>'mail'], $body,  function($message) use($mail, $sender_email, $subject){
                $message->from($sender_email);
                $message->bcc($mail);
                $message->subject($subject);
            });
        }

        LogActivity::addToLog();
        $user->save();

        return back()->with('message','Mail Send Successfully');
    }