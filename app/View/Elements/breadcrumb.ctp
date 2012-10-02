<?php
$controller = $this->request->params['controller'];
$action = $this->request->params['action'];
if($controller == 'users')  {
	if($action == 'userDashboard') {
		$this->Html->addCrumb('Study Online','/users/userDashboard');
		$currentPage = 'Dashboard';
	}
	if($action == 'login') {
		if(!empty($this->request->params['pass'])) {
			if($this->request->params['pass'][0]=='users' && $this->request->params['pass'][1] == 'myprofile') {
				$this->Html->addCrumb('My Profile','/users/myprofile');
				$currentPage = 'View';
			}elseif($this->request->params['pass'][0]== 'users' && $this->request->params['pass'][1]== 'userDashboard') {
				$this->Html->addCrumb('Study Online','/users/userDashboard');
				$currentPage = 'Dashboard';
			}elseif($this->request->params['pass'][0]== 'users' && $this->request->params['pass'][1]== 'updateprofile') {
				$this->Html->addCrumb('My Profile','/users/myprofile');
				$currentPage = 'Edit';
			}elseif($this->request->params['pass'][0]== 'users' && $this->request->params['pass'][1]== 'changepassword') {
				$this->Html->addCrumb('My Profile','/users/myprofile');
				$currentPage = 'Change Password';
			}elseif(($this->request->params['pass'][0]== 'intelligent-learning-systems' || $this->request->params['pass'][0]== 'intelligent_learning_systems') && ($this->request->params['pass'][1]== 'overview' || $this->request->params['pass'][1]== 'intelligentSystems')) {
				if($this->Session->check('User'))
					$this->Html->addCrumb('Study Online','/users/userDashboard');
				else
					$this->Html->addCrumb('Study Online','/intelligent-learning-systems/overview');
				$currentPage = 'Intelligent Learning System';
			}elseif(($this->request->params['pass'][0] == 'study_online' || $this->request->params['pass'][0] == 'study_online') && ($this->request->params['pass'][1]== 'chapters' || $this->request->params['pass'][1]== 'solutions')) {
				if($this->Session->check('User'))
					$this->Html->addCrumb('Study Online','/users/userDashboard');
				else
					$this->Html->addCrumb('Study Online','/study-online/chapters');
				$currentPage = 'NCERT Solutions';
			}elseif(($this->request->params['pass'][0] == 'study_online' || $this->request->params['pass'][0] == 'study_online') && $this->request->params['pass'][1]== 'studymaterial') {
				if($this->Session->check('User'))
					$this->Html->addCrumb('Study Online','/users/userDashboard');
				else
					$this->Html->addCrumb('Study Online','/study-online/studymaterial');
		        $currentPage = 'Study Material';
			}elseif(($this->request->params['pass'][0] == 'study_online' || $this->request->params['pass'][0] == 'study_online') && $this->request->params['pass'][1]== 'puzzles') {
				if($this->Session->check('User'))
					$this->Html->addCrumb('Study Online','/users/userDashboard');
				else
					$this->Html->addCrumb('Study Online','/study-online/puzzles');
				$currentPage = 'Puzzles';
			}elseif(($this->request->params['pass'][0]== 'sample-papers-model-tests' || $this->request->params['pass'][0]== 'sample_papers_model_tests') && ($this->request->params['pass'][1]== 'test_papers' || $this->request->params['pass'][1]== 'test-papers')) {
				if($this->Session->check('User'))
					$this->Html->addCrumb('Study Online','/users/userDashboard');
				else
					$this->Html->addCrumb('Study Online','/sample-papers-model-tests/test-papers');
				$currentPage = 'Test Papers';
			}elseif($this->request->params['pass'][0]== 'school_notes' && $this->request->params['pass'][1]== 'revisionNotes') {
				if($this->Session->check('User'))
					$this->Html->addCrumb('Study Online','/users/userDashboard');
				else
					$this->Html->addCrumb('Study Online','/school-notes/revisionNotes');
				$currentPage = 'Revision Notes';
			}elseif(($this->request->params['pass'][0]== 'personality_zone' || $this->request->params['pass'][0]== 'personality-zone') && ($this->request->params['pass'][1]== 'overviewContent' || $this->request->params['pass'][1]== 'personality')) {
				$this->Html->addCrumb('Personality Tests','/personality-zone/personality');
				$currentPage = 'personality';
			}elseif(($this->request->params['pass'][0]== 'personality_zone' || $this->request->params['pass'][0]== 'personality-zone') && ($this->request->params['pass'][1]== 'aptitude' || $this->request->params['pass'][1]== 'aptitudeResult')) {
				$this->Html->addCrumb('Personality Tests','/personality-zone/personality');
				$this->Html->addCrumb('Aptitude Evaluation','/personality-zone/aptitude');
				$currentPage = 'Overview';
			}else{
				$this->Html->addCrumb('Home','/');
				$currentPage = 'Login';
			}
		}else{
			$this->Html->addCrumb('Home','/');
			$currentPage = 'Login';
		}
	}
	if($action == 'useractivation') {
		$this->Html->addCrumb('Home','/');
		$this->Html->addCrumb('Login','/users/login');
		$currentPage = 'Activate Account';
	}
	if($action == 'reactivation') {
		$this->Html->addCrumb('Home','/');
		$this->Html->addCrumb('Login','/users/login');
		$currentPage = 'Reactivate Account';
	}
	if($action == 'registration' || $action == 'confirmregistration' || $action == 'confirminvitation') {
		$this->Html->addCrumb('Home','/');
		$currentPage = 'Register';
	}
	if($action == 'myprofile') {
		$this->Html->addCrumb('My Profile','/users/myprofile');
		$currentPage = 'View';
	}
	if($action == 'updateprofile' || $action == 'confirmupdateprofile' || $action == 'curriculum_update' || $action == 'update_trial_email_password') {
		$this->Html->addCrumb('My Profile','/users/myprofile');
		$currentPage = 'Edit';
	}
	if($action == 'changepassword' || $action == 'confirmpasswordchange') {
		$this->Html->addCrumb('My Profile','/users/myprofile');
		$currentPage = 'Change Password';
	}
	if($action == 'forgotpassword') {
		$this->Html->addCrumb('Home','/');
		$this->Html->addCrumb('Login','/users/login');
		$currentPage = 'Forgot Password';
	}
	if($action == 'passwordsent') {
		$this->Html->addCrumb('Home','/');
		$this->Html->addCrumb('Login','/users/login');
		$currentPage = 'Forgot Password';
	}
	if($action == 'paymentStatus') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$currentPage = 'Payment Result';
	}
	if($action == 'productCheckout') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$currentPage = 'Checkout';
	}
	if($action == 'checkoutByDropCheque') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$currentPage = 'Drop Cheque';
	}
	if($action == 'checkoutByFax') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$currentPage = 'Drop Cheque';
	}
	if($action == 'checkoutByDDCheque') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$currentPage = 'Drop Cheque';
	}
	if($action == 'confirmDropCheque') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$currentPage = 'Payment Result';
	}
	if($action == 'newpassword') {
		$this->Html->addCrumb('Home','/');
		$this->Html->addCrumb('Login','/users/login');
		$currentPage = 'Change new Password';
	}

	if($action == 'unsubscribe') {
		$this->Html->addCrumb('Home','/');
		$currentPage = 'Unsubscribe';
	}
	if($action == 'emailactivation') {
		$this->Html->addCrumb('My Profile','/users/myprofile');
		$currentPage = 'Edit';
	}
	if($action == 'tutorsearch') {
		$this->Html->addCrumb('Home','/');
		$currentPage = 'Tutor Search';
	}
	if($action == 'tutorprofile') {
		$this->Html->addCrumb('Home','/');
		$this->Html->addCrumb('Tutor Search','/users/tutorsearch');
		$currentPage = 'Search Result';
	}
	if($action == 'updatetutorprofile') {
		$this->Html->addCrumb('Home','/');
		$currentPage = 'Edit Profile';
	}
	if($action == 'updatetutorsubject') {
		$this->Html->addCrumb('Home','/');
		$currentPage = 'Edit Subject';
	}
	if($action == 'tutorswelcome') {
		$this->Html->addCrumb('Home','/');
		$currentPage = 'Welcome';
	}
}
if($controller == 'study_online') {
	if($action == 'chapters') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','/study-online/chapters');
		}
		$currentPage = 'NCERT Solutions';
	}
	if($action == 'studymaterial' || $action == 'lesson') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','/study-online/studymaterial');
		}
		$currentPage = 'Study Material';
	}
	if($action == 'solutions') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','/study-online/chapters');
		}
		$this->Html->addCrumb('NCERT Solutions','/study-online/chapters');
		if($gradeid != '' && $subjectid != '' && $chapterid != '') {
		$this->Html->addCrumb($subjectname,'/study-online/chapters/'.$subjectname.'/'.$this->Util->mnEncrypt($gradeid).'/'.$this->Util->mnEncrypt($textbookid).'/'.$this->Util->mnEncrypt($chapterid));
				if(isset($chapterName['Chapter']['name'])) {
					$chaptername = $chapterName['Chapter']['name'];
					$chapterno = $chapterName['Chapter']['chapterNo'];
					$currentPage = $chapterno.' '.$chaptername;
				}
			}
	}

	if($action == 'puzzles') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','/study-online/puzzles');
		}
		$currentPage = 'Puzzles';
	}
	if($action == 'fatLesson') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','intelligent-learning-systems/intelligentSystems');
		}
		$this->Html->addCrumb('overview','/intelligent-learning-systems/overview');
		$this->Html->addCrumb('Intelligent Learning System','/intelligent-learning-systems/intelligentSystems');
		$this->Html->addCrumb('Report','/intelligent-learning-systems/ilsReport/'.$testid);
		$currentPage = 'Studyplan';
	}
}

if($controller == 'htmls') {
	if($action == 'index') {
		$this->Html->addCrumb('Home','/');
		$currentPage = 'Home';
	}
	if($action == 'careerassessment') {
		$currentPage = 'Career Advice';
	}
	if($action == 'blogs') {
		//$currentPage = 'Blog';
	}
	if($action == 'hotcareers') {
		$this->Html->addCrumb('Career Advice','/htmls/careerassessment');
		$currentPage = 'Hot Careers';
	}
	if($action == 'faq') {
		$currentPage = 'FAQs';
	}
	if($action == 'syllabus') { 
		$this->Html->addCrumb('Syllabus','/htmls/syllabus');
		$currentPage = 'View';
	}
	}

if($controller == 'sample_papers_model_tests') {
	if($action == 'test_papers') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','/sample-papers-model-tests/test-papers');
		}
		$currentPage = 'Test Papers';
	}elseif($action == 'testReport') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','/sample-papers-model-tests/test-papers');
		}
		$this->Html->addCrumb('Test Papers','/sample-papers-model-tests/test-papers');
		$this->Html->addCrumb($seosubject,'/sample-papers-model-tests/test-papers/'.$seosubject.'/'.$gradeId.'/'.$textbookId);
		$currentPage = 'Report';
	}elseif($action == 'predefinefulltest') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','/sample-papers-model-tests/test-papers');
		}
		$this->Html->addCrumb('Test Papers','/sample-papers-model-tests/test-papers');
		$this->Html->addCrumb($seosubject,'/sample-papers-model-tests/test-papers/'.$seosubject.'/'.$gradeid.'/'.$textbookid);
		$currentPage = 'QA Test';
	}
}

if($controller == 'school_notes') {
	if($action == 'revisionNotes') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','/school-notes/revisionNotes');
		}
		$currentPage = 'Revision Notes';  
	}
}

if($controller == 'intelligent_learning_systems') {
	if($action == 'overview') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','/intelligent-learning-systems/overview');
		}
		$currentPage = 'overview';
	}elseif($action == 'intelligentSystems') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','/intelligent-learning-systems/overview');
		}
		if($this->Session->check('User')){
			$this->Html->addCrumb('overview','/intelligent-learning-systems/overview');
		}else{
			$this->Html->addCrumb('overview','/intelligent-learning-systems/overview');
		}
		$currentPage = 'Intelligent Learning System';
	}elseif($action == 'ilsReport') {
		if($this->Session->check('User')){
			$this->Html->addCrumb('Study Online','/users/userDashboard');
		}else{
			$this->Html->addCrumb('Study Online','/intelligent-learning-systems/ilsReport');
		}
		$this->Html->addCrumb('overview','/intelligent-learning-systems/overview');
		$this->Html->addCrumb('Intelligent Learning System','/intelligent-learning-systems/intelligentSystems');
		$currentPage = 'Report';
	}
}

if($controller == 'personality_zone') {
	if($action == 'overviewContent') {
		$this->Html->addCrumb('Personality Tests','/personality-zone/overviewContent');
		$currentPage = 'overviewContent';
	}elseif($action == 'personality') {
		$this->Html->addCrumb('Personality Tests','/personality-zone/personality');
		$currentPage = 'Personality Evaluation';
	}elseif($action == 'dimensionResult') {
		$this->Html->addCrumb('Personality Tests','/personality-zone/overviewContent');
		$currentPage = 'Result';
	}elseif($action == 'aptitudeOverviewContent') {
		$this->Html->addCrumb('Personality Tests','/personality-zone/personality');
		$this->Html->addCrumb('Aptitude Tests','/personality-zone/aptitudeOverviewContent');
		$currentPage = 'overviewContent';
	}elseif($action == 'aptitude') {
		$this->Html->addCrumb('Personality Tests','/personality-zone/personality');
		$this->Html->addCrumb('Aptitude Evaluation','/personality-zone/aptitude');
		$currentPage = 'Overview';
	}elseif($action == 'aptitudeResult') {
		$this->Html->addCrumb('Personality Tests','/personality-zone/personality');
		$this->Html->addCrumb('Aptitude Tests','/personality-zone/aptitudeResult');
		$currentPage = 'Result';
	}elseif($action == 'articles') {
		$this->Html->addCrumb('Personality Tests','/personality-zone/personality');
		if(isset($breadcrumbCurrentPage)){
			$this->Html->addCrumb('Skill Builder','/personality-zone/articles');
			$currentPage = $breadcrumbCurrentPage;
		}else{
			$currentPage = 'Skill Builder';
		}
	}
}

if($controller == 'products') {
	if($action == 'benefits') {
		$this->Html->addCrumb('Purchase','/products/benefits');
		$currentPage = 'Benefits';
	}elseif($action == 'features') {
		$this->Html->addCrumb('Purchase','/products/features');
		$currentPage = 'Features';
	}elseif($action == 'purchase') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$currentPage = 'Purchase';
	}elseif($action == 'price_contents') {
		$this->Html->addCrumb('Purchase','/products/price-contents');
		$currentPage = 'Contents & price';
	}elseif($action == 'compare') {
		$this->Html->addCrumb('Purchase','/products/compare');
		$currentPage = 'Compare';
	}elseif($action == 'testimonials') {
		$this->Html->addCrumb('Purchase','/products/testimonials');
		$currentPage = 'Testimonials';
	}elseif($action == 'purchaseMethod') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$this->Html->addCrumb('Purchase','/products/purchaseMethod');
		$currentPage = 'Payment method';
	}elseif($action == 'paymentStatus') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$this->Html->addCrumb('Purchase','/products/purchaseMethod');
		$this->Html->addCrumb('Payment method','/products/purchaseMethod');
		$currentPage = 'Payment Result';
	}elseif($action == 'checkoutByFax') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$this->Html->addCrumb('Purchase','/products/purchaseMethod');
		$this->Html->addCrumb('Payment method','/products/purchaseMethod');
		$currentPage = 'Credit Card by FAX';
	}elseif($action == 'userChequeInformation') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$this->Html->addCrumb('Purchase','/products/purchaseMethod');
		$this->Html->addCrumb('Payment method','/products/purchaseMethod');
		$currentPage = 'Cheque Information';
	}elseif($action == 'checkoutByDDCheque') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$this->Html->addCrumb('Purchase','/products/purchaseMethod');
		$this->Html->addCrumb('Payment method','/products/purchaseMethod');
		$currentPage = 'Mail Cheque';
	}elseif($action == 'checkoutByDropCheque' || $action == 'confirmDropCheque') {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$this->Html->addCrumb('Purchase','/products/purchaseMethod');
		$this->Html->addCrumb('Payment method','/products/purchaseMethod');
		$currentPage = 'Deposit Cheque';
	}else {
		$this->Html->addCrumb('Purchase','/products/purchase');
		$currentPage = 'Quick Payment';
	}
}

if($controller == 'discuss') {
    if($action == 'category') {
        $this->Html->addCrumb('Ask & Answer','/discuss/category');
        $currentPage = 'Category';
    }elseif($action == 'bysubject') {
        $this->Html->addCrumb('Ask & Answer','/discuss/category');
        $currentPage = 'subject-wise';
    }elseif($action == 'ask_question') {
        $this->Html->addCrumb('Ask & Answer','/discuss/category');
        $currentPage = 'Ask Question';
    }elseif($action == 'my_questions') {
        $this->Html->addCrumb('Ask & Answer','/discuss/category');
        $currentPage = 'My Questions';
    }elseif($action == 'my_answers') {
        $this->Html->addCrumb('Ask & Answer','/discuss/category');
        $currentPage = 'My Answers';
    }elseif($action == 'question') {
        $this->Html->addCrumb('Ask & Answer','/discuss/category');
		if(isset($breadCrumbLink)) {
            foreach($breadCrumbLink as $key=>$value){
			    if($value=='')
				    $currentPage = $key;
			    else
				    $this->Html->addCrumb($key,$value);
		    }
        }
    }elseif($action == 'search') {
        $this->Html->addCrumb('Ask & Answer','/discuss/category');
        $currentPage = 'Search';
    }elseif($action == 'top_members') {
        $this->Html->addCrumb('Ask & Answer','/discuss/category');
        $currentPage = 'Top Members';
    }elseif($action == 'settings') {
        $this->Html->addCrumb('Ask & Answer','/discuss/category');
        $currentPage = 'Settings';
    }elseif($action == 'user') {
        $this->Html->addCrumb('Ask & Answer','/discuss/category');
        $currentPage = 'User questions & answers';    
    }
}

if(isset($currentPage)) {
	echo $this->Html->getCrumbs().'&raquo;'.'<a>'.$currentPage.'</a>';
}
?>