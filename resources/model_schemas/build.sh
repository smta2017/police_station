
echo "Starting ..."

# php artisan vendor:publish --provider="InfyOm\Generator\InfyOmGeneratorServiceProvider"
# php artisan infyom:api_scaffold Country  --fieldsFile='resources/model_schemas/aa-Country.json' -n
# php artisan infyom:api_scaffold State --fieldsFile='resources/model_schemas/ab-State.json' -n
# php artisan infyom:api_scaffold Branch --fieldsFile='resources/model_schemas/ac-Branch.json' -n
# php artisan infyom:api_scaffold City --fieldsFile='resources/model_schemas/ac-City.json' -n
# php artisan infyom:api_scaffold CityBranch --fieldsFile='resources/model_schemas/ac-CityBranch.json' -n

# php artisan infyom:api_scaffold Admin --fieldsFile='resources/model_schemas/ba-Admin.json' -n
# php artisan infyom:api_scaffold Instructor --fieldsFile='resources/model_schemas/ba-Instructor.json' -n
# php artisan infyom:api_scaffold Nationality --fieldsFile='resources/model_schemas/ba-Nationality.json' -n
# php artisan infyom:api_scaffold Student --fieldsFile='resources/model_schemas/ba-Student.json' -n
# php artisan infyom:api_scaffold UserNationality --fieldsFile='resources/model_schemas/bb-UserNationality.json' -n

php artisan infyom:api_scaffold MaterialCategory --fieldsFile='resources/model_schemas/ca-MaterialCategory.json' -n
php artisan infyom:api_scaffold Material --fieldsFile='resources/model_schemas/cb-Material.json' -n
php artisan infyom:api_scaffold Books --fieldsFile='resources/model_schemas/cc-Books.json' -n
php artisan infyom:api_scaffold InstructorMaterial --fieldsFile='resources/model_schemas/cc-InstructorMaterial.json' -n
php artisan infyom:api_scaffold Audience --fieldsFile='resources/model_schemas/cc-Audience.json' -n
php artisan infyom:api_scaffold TheClass --fieldsFile='resources/model_schemas/cc-TheClass.json' -n
php artisan infyom:api_scaffold ClassFrequencies --fieldsFile='resources/model_schemas/cd-ClassFrequencies.json' -n
php artisan infyom:api_scaffold Session --fieldsFile='resources/model_schemas/cd-Session.json' -n
php artisan infyom:api_scaffold ClassParticipates --fieldsFile='resources/model_schemas/d-ClassParticipates.json' -n
php artisan infyom:api_scaffold Attendances --fieldsFile='resources/model_schemas/db-Attendances.json' -n

php artisan infyom:api_scaffold Exam --fieldsFile='resources/model_schemas/ea-Exam.json' -n
php artisan infyom:api_scaffold ExamAttempt --fieldsFile='resources/model_schemas/ea-ExamAttempt.json' -n
php artisan infyom:api_scaffold ExamQuestion --fieldsFile='resources/model_schemas/ea-ExamQuestion.json' -n
php artisan infyom:api_scaffold QuestionAnswer --fieldsFile='resources/model_schemas/ea-QuestionAnswer.json' -n
php artisan infyom:api_scaffold SessionDetail --fieldsFile='resources/model_schemas/eb-SessionDetail.json' -n

php artisan infyom:api_scaffold Translator --fieldsFile='resources/model_schemas/ec-Translator.json' -n
php artisan infyom:api_scaffold Status --fieldsFile='resources/model_schemas/dda-Status.json' -n

php artisan vendor:publish --provider="InfyOm\Generator\InfyOmGeneratorServiceProvider"
php artisan infyom:publish

php artisan migrate:fresh --seed
echo "Finished!"
