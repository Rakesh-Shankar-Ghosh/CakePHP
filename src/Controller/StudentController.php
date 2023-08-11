<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Student Controller
 *
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentController extends AppController
{
    


// public function getStudents()
//     {
//         $this->request->allowMethod(['get']); // Allow only GET requests
    
//         try {
//             $studentsTable = $this->getTableLocator()->get('Students');
//             $students = $studentsTable->find()->all();
    
    
//             $response = [
//                 'success' => true,
//                 'result' => $students,
//             ];
    
//             return $this->getResponse()
//                 ->withType('application/json')
//                 ->withStatus(200)
//                 ->withStringBody(json_encode($response));
//         } catch (\Exception $error) {
//             $response = [
//                 'success' => false,
//                 'message' => 'An error occurred while fetching student data',
//                 'error' => $error->getMessage(),
//             ];
    
//             return $this->getResponse()
//                 ->withType('application/json')
//                 ->withStatus(500)
//                 ->withStringBody(json_encode($response));
//         }
//     }
    
//***** */


public function getStudents()
{
    $this->request->allowMethod(['get']); // Allow only GET requests

    try {
        $studentsTable = $this->getTableLocator()->get('Students');
        $students = $studentsTable->find()->all();

        $response = [
            'success' => true,
            'result' => $students,
        ];

        return $this->getResponse()
            ->withType('application/json')
            ->withStatus(200) // HTTP status code for OK
            ->withStringBody(json_encode($response));
    } catch (\Exception $error) {
        $response = [
            'success' => false,
            'message' => 'An error occurred while fetching student data',
            'error' => $error->getMessage(),
        ];

        return $this->getResponse()
            ->withType('application/json')
            ->withStatus(500) // HTTP status code for Internal Server Error
            ->withStringBody(json_encode($response));
    }
}












public function addStudent()
{
    $this->request->allowMethod(['post']);
   
    $data = $this->request->getData();

    // Assuming the data includes 'name' and 'age' fields
    $name = $data['name'];
    $age = $data['age'];

    

    $studentsTable = $this->getTableLocator()->get('Students');
    
    try {
        $student = $studentsTable->newEntity([
            'name' => $name,
            'age' => $age,
        ]);
        
        if ($studentsTable->save($student)) {
            $response = [
                'success' => true,
                'message' => 'Student added successfully',
            ];
            $statusCode = 200;
        } else {
            // Debug validation errors if save fails
            // debug($student->getErrors());
            
            $response = [
                'success' => false,
                'message' => 'Failed to add student',
            ];
            $statusCode = 500;
        }
    } catch (\Exception $error) {
        $response = [
            'success' => false,
            'message' => 'Error while adding student',
            'error' => $error->getMessage(),
        ];
        $statusCode = 500;
    }

    // Debug response before sending
    // debug($response);

    return $this->getResponse()
        ->withType('application/json')
        ->withStatus($statusCode)
        ->withStringBody(json_encode($response));
}


public function getStudentById($id)
{
    $this->request->allowMethod(['get']); // Allow only GET requests

    try {
        $studentsTable = $this->getTableLocator()->get('Students');
        $student = $studentsTable->get($id);

        $response = [
            'success' => true,
            'data' => [
                'id' => $student->id,
                'name' => $student->name,
                'age' => $student->age,
            ],
        ];

        return $this->getResponse()
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($response));
    } catch (\Cake\Datasource\Exception\RecordNotFoundException $error) {
        $response = [
            'success' => false,
            'message' => 'Student not found',
        ];

        return $this->getResponse()
            ->withType('application/json')
            ->withStatus(404)
            ->withStringBody(json_encode($response));
    } catch (\Exception $error) {
        $response = [
            'success' => false,
            'message' => 'An error occurred while fetching student data',
            'error' => $error->getMessage(),
        ];

        return $this->getResponse()
            ->withType('application/json')
            ->withStatus(500)
            ->withStringBody(json_encode($response));
    }
}

  // Inside the test method of StudentController.php

    public function test()
    {
        $data = 5;
       
    
        try {
            if ($data == 5) {
                $response = [
                    'success' => true,
                    'message' => 'perfectly done',
                    'data' => $data,
                ];
                $statusCode = 200;
            }
            else{
                $response = [
                    'success' => false,
                    'message' => 'not working..',
                ];
                $statusCode = 404;
            }
        } catch (\Exception $error) {
            $response = [
                'success' => false,
                'message' => 'Error while getting',
                'error' => $error->getMessage(),
            ];
            $statusCode = 500;
        }
    
        return $this->getResponse()
            ->withType('application/json')
            ->withStatus($statusCode)
            ->withStringBody(json_encode($response));
    }
    
    

    
    // public function deleteStudentById($id)
    // {
    //     $this->request->allowMethod(['delete']); // Allow only DELETE requests
    
    //     try {
    //         $studentsTable = $this->getTableLocator()->get('Students');
    //         $student = $studentsTable->get($id);
    
    //         if ($studentsTable->delete($student)) {
    //             $response = [
    //                 'success' => true,
    //                 'message' => 'Student deleted successfully',
    //             ];
    //         } else {
    //             $response = [
    //                 'success' => false,
    //                 'message' => 'Failed to delete student',
    //             ];
    //         }
    
    //         return $this->getResponse()
    //             ->withType('application/json')
    //             ->withStatus(200)
    //             ->withStringBody(json_encode($response));
    //     } catch (\Cake\Datasource\Exception\RecordNotFoundException $error) {
    //         $response = [
    //             'success' => false,
    //             'message' => 'Student not found',
    //         ];
    
    //         return $this->getResponse()
    //             ->withType('application/json')
    //             ->withStatus(404)
    //             ->withStringBody(json_encode($response));
    //     } catch (\Exception $error) {
    //         $response = [
    //             'success' => false,
    //             'message' => 'An error occurred while deleting student',
    //             'error' => $error->getMessage(),
    //         ];
    
    //         return $this->getResponse()
    //             ->withType('application/json')
    //             ->withStatus(500)
    //             ->withStringBody(json_encode($response));
    //     }
    // }
    

    public function deleteStudentById($id)
    {
        $this->request->allowMethod(['delete']); // Allow only DELETE requests
    
        try {
            $studentsTable = $this->getTableLocator()->get('Students');
            $student = $studentsTable->get($id);
    
            if ($studentsTable->delete($student)) {
                $response = [
                    'success' => true,
                    'message' => 'Student deleted successfully',
                ];
                $statusCode = 200;
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Failed to delete student',
                ];
                $statusCode = 500;
            }
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $error) {
            $response = [
                'success' => false,
                'message' => 'Student not found',
            ];
            $statusCode = 404;
        } catch (\Exception $error) {
            $response = [
                'success' => false,
                'message' => 'An error occurred while deleting student',
                'error' => $error->getMessage(),
            ];
            $statusCode = 500;
        }
    
        return $this->getResponse()
            ->withType('application/json')
            ->withStatus($statusCode)
            ->withStringBody(json_encode($response));
    }
    

public function updateStudentById($id)
{
    $this->request->allowMethod(['put']); // Allow only PUT requests

    $data = $this->request->getData();

    try {
        $studentsTable = $this->getTableLocator()->get('Students');
        $student = $studentsTable->get($id);

        $student = $studentsTable->patchEntity($student, $data);

        if ($studentsTable->save($student)) {
            $response = [
                'success' => true,
                'message' => 'Student updated successfully',
            ];
            $statusCode = 200;
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to update student',
            ];
            $statusCode = 500;
        }
    } catch (\Cake\Datasource\Exception\RecordNotFoundException $error) {
        $response = [
            'success' => false,
            'message' => 'Student not found',
        ];
        $statusCode = 404;
    } catch (\Exception $error) {
        $response = [
            'success' => false,
            'message' => 'An error occurred while updating student',
            'error' => $error->getMessage(),
        ];
        $statusCode = 500;
    }

    return $this->getResponse()
        ->withType('application/json')
        ->withStatus($statusCode)
        ->withStringBody(json_encode($response));
}

    
    
    
    
    
    

}















    // public function adStudent()
    // {
    //     // Skip CSRF protection for JSON requests
    //     $this->getEventManager()->off($this->Csrf);
    
    //     $this->request->allowMethod(['post']);
    
    //     // Retrieve JSON data from the request
    //     $data = $this->request->getParsedBody();
    
    //     // Assuming the data includes 'name' and 'age' fields
    //     $name = $data['name'] ?? null;
    //     $age = $data['age'] ?? null;
    
    //     if ($name === null || $age === null) {
    //         $response = [
    //             'success' => false,
    //             'message' => 'Invalid input data',
    //         ];
    //         return $this->getResponse()
    //             ->withType('application/json')
    //             ->withStatus(400)
    //             ->withStringBody(json_encode($response));
    //     }
    
    //     $studentsTable = $this->getTableLocator()->get('Students');
    
    //     try {
    //         $student = $studentsTable->newEntity([
    //             'name' => $name,
    //             'age' => $age,
    //         ]);
    
    //         if ($studentsTable->save($student)) {
    //             $response = [
    //                 'success' => true,
    //                 'message' => 'Student added successfully',
    //             ];
    //             $statusCode = 201; // Created status code
    //         } else {
    //             $errors = $student->getErrors();
    //             $response = [
    //                 'success' => false,
    //                 'message' => 'Failed to add student',
    //                 'errors' => $errors,
    //             ];
    //             $statusCode = 500;
    //         }
    //     } catch (\Exception $error) {
    //         $response = [
    //             'success' => false,
    //             'message' => 'Error while adding student',
    //             'error' => $error->getMessage(),
    //         ];
    //         $statusCode = 500;
    //     }
    
    //     return $this->getResponse()
    //         ->withType('application/json')
    //         ->withStatus($statusCode)
    //         ->withStringBody(json_encode($response));
    // }
    



    
    // public function addStudent()
    // {
    //     $this->request->allowMethod(['post']);
       
    //     $data = $this->request->getData();
    
    //     // Input validation and sanitization
    //     $name = $data['name'];
    //     $age = $data['age'];
    
    //     if ($name === false || $age === false) {
    //         $response = [
    //             'success' => false,
    //             'message' => 'Invalid input data',
    //         ];
    //         return $this->getResponse()
    //             ->withType('application/json')
    //             ->withStatus(400)
    //             ->withStringBody(json_encode($response));
    //     }
    
    //     $studentsTable = $this->getTableLocator()->get('Students');
        
    //     try {
    //         $student = $studentsTable->newEntity([
    //             'name' => $name,
    //             'age' => $age,
    //         ]);
            
    //         if ($studentsTable->save($student)) {
    //             $response = [
    //                 'success' => true,
    //                 'message' => 'Student added successfully',
    //             ];
    //             $statusCode = 201; // Created status code
    //         } else {
    //             // Proper exception handling and logging
    //             $errors = $student->getErrors();
    //             // Log errors here
    //             $response = [
    //                 'success' => false,
    //                 'message' => 'Failed to add student',
    //                 'errors' => $errors,
    //             ];
    //             $statusCode = 500;
    //         }
    //     } catch (\Exception $error) {
    //         // Log exception here
    //         $response = [
    //             'success' => false,
    //             'message' => 'Failed to save student',
    //             'error' => $error->getMessage(),
    //         ];
    //         $statusCode = 500;
    //     }
    
    //     // Log response here
    
    //     return $this->getResponse()
    //         ->withType('application/json')
    //         ->withStatus($statusCode)
    //         ->withStringBody(json_encode($response));
    // }
