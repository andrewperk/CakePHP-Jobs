<?php

class Job extends AppModel {
    public $name = 'Job';
    
    public $actsAs = array('Search.Searchable');
    
    public $filterArgs = array(
        array('name'=>'jobtype', 'type'=>'like', 'field'=>'Job.jobtype'),
        array('name'=>'joblocation', 'type'=>'like', 'field'=>'Job.joblocation'),
        array('name'=>'jobtitle', 'type'=>'like', 'field'=>'Job.jobtitle'),
        array('name'=>'companyname', 'type'=>'like', 'field'=>'Job.companyname')
    );  
    
    public $validate = array(
        'firstname'=>array(
            'not empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Enter your first name.'
            ),
            'min length'=>array(
                'rule'=>array('minLength', 2),
                'message'=>'Minimum length is 2 characters'
            ),
            'letters only'=>array(
                'rule'=>'/^[a-z]{2,}$/i',
                'message'=>'Should only contain letters.'
            )
        ),
        'lastname'=>array(
            'not empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Enter your last name.'
            ),
            'min length'=>array(
                'rule'=>array('minLength', 2),
                'message'=>'Minimum length is 2 characters'
            ),
            'letters only'=>array(
                'rule'=>'/^[a-z]{2,}$/i',
                'message'=>'Should only contain letters.'
            )
        ),
        'phone'=>array(
            'not empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Enter your phone number.'
            ),
            'valid us phone number'=>array(
                'rule'=>'phone',
                'message'=>'Enter a valid U.S. phone number.'
            )
        ),
        'email'=>array(
            'not empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Enter your email address.'
            ),
            'valid email'=>array(
                'rule'=>'email',
                'message'=>'Enter a valid email address.'
            )
        ),
        'jobtype'=>array(
            'not empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Choose a job type.'
            ),
            'in list'=>array(
                'rule'=>array('inlist', array('Full-time', 'Part-time', 'Freelance', 'Contract', 'Internship')),
                'message'=>'Invalid job type, please choose one from the list.'
            )
        ),
        'jobtitle'=>array(
            'not empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Give your job a title.'
            ),
            'min length'=>array(
                'rule'=>array('minLength', 5),
                'message'=>'Minimum length is 5 characters'
            ),
            'letters, numbers, spaces only'=>array(
                'rule'=>'/^[a-z0-9\' ]{5,}$/i',
                'message'=>'Should only contain letters, numbers, and spaces.'
            )
        ),
        'jobdesc'=>array(
            'not empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Describe your job in at least 100 characters.'
            ),
            'minimum'=>array(
                'rule'=>array('minLength', 100),
                'message'=>'Minimum length is 100 characters.'
            ),
        ),
        'jobsalary'=>array(
            'min length'=>array(
                'rule'=>array('minLength', 2),
                'message'=>'Minimum length is 2 characters.',
                'allowEmpty'=>true
            )
        ),
        'joblocation'=>array(
            'not empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Enter the job location (can be telecommute).'
            ),
            'min length'=>array(
                'rule'=>array('minLength', 2),
                'message'=>'Minimum length is 2 characters.'
            )
        ),
        'applyemail'=>array(
            'valid email if not empty'=>array(
                'rule'=>'email',
                'message'=>'Enter a valid email address.',
                'allowEmpty'=>true
            )
        ),
        'applyurl'=>array(
            'valid url if not empty'=>array(
                'rule'=>'url',
                'message'=>'Enter a valid URL.',
                'allowEmpty'=>true
            )
        ),
        'companyname'=>array(
            'Min length'=>array(
                'rule'=>array('minLength', 2),
                'message'=>'Minimum length is 2 characters.',
                'allowEmpty'=>true
            ),
            'No special chars'=>array(
                'rule'=>'/^[a-z0-9\',. ]{2,}$/i',
                'message'=>'Should only contain alphanumeric, spaces, commas, and periods.',
                'allowEmpty'=>true
            )
        ),
        'companyurl'=>array(
            'valid url if not empty'=>array(
                'rule'=>'url',
                'message'=>'Enter a valid URL.',
                'allowEmpty'=>true
            )
        )
    );
}
