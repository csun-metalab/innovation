<?php

use Illuminate\Database\Seeder;
use Helix\Models\Interest;


class RunInterest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Interest::create([
'attribute_id' =>"research:1",
'title' =>"Architecture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"NULL",
'hierarchy' =>"NULL",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:10",
'title' =>"Social and Behavioral Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"NULL",
'hierarchy' =>"NULL",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:100",
'title' =>"Administration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1000",
'title' =>"Respiratory Tract Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1001",
'title' =>"Rhetoric", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:59",
'hierarchy' =>"Rhetoric and Composition",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1002",
'title' =>"Rheumatology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1003",
'title' =>"Robotics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:136",
'hierarchy' =>"Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1004",
'title' =>"Rural Sociology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1005",
'title' =>"Russian Linguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:61",
'hierarchy' =>"Slavic Languages and Societies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1006",
'title' =>"Russian Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:61",
'hierarchy' =>"Slavic Languages and Societies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1007",
'title' =>"Scholarly Communication", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:334",
'hierarchy' =>"Library and Information Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1008",
'title' =>"Scholarly Publishing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:334",
'hierarchy' =>"Library and Information Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1009",
'title' =>"Scholarship of Teaching and Learning", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:116",
'hierarchy' =>"Higher Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:101",
'title' =>"Art Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1010",
'title' =>"School Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1011",
'title' =>"Science and Technology Policy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1012",
'title' =>"Screenwriting", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:39",
'hierarchy' =>"Film and Media Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1013",
'title' =>"Sculpture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1014",
'title' =>"Secondary Education and Teaching", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:127",
'hierarchy' =>"Teacher Education and Professional Development",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1015",
'title' =>"Sedimentology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1016",
'title' =>"Semantics and Pragmatics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1017",
'title' =>"Semiconductor and Optical Materials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:140",
'hierarchy' =>"Materials Science and Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1018",
'title' =>"Sense Organs", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1019",
'title' =>"Service Learning", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:102",
'title' =>"Bilingual, Multilingual, and Multicultural Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1020",
'title' =>"Set Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:318",
'hierarchy' =>"Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1021",
'title' =>"Sheep and Goat Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:263",
'hierarchy' =>"Animal Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1022",
'title' =>"Signal Processing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:137",
'hierarchy' =>"Electrical and Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1023",
'title' =>"Skin and Connective Tissue Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1024",
'title' =>"Small or Companion Animal Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:311",
'hierarchy' =>"Veterinary Medicine",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1025",
'title' =>"Social and Cultural Anthropology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:324",
'hierarchy' =>"Anthropology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1026",
'title' =>"Social Control, Law, Crime, and Deviance", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1027",
'title' =>"Social History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1028",
'title' =>"Social Influence and Political Communication", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1029",
'title' =>"Social Media", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:103",
'title' =>"Community College Leadership", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1030",
'title' =>"Social Policy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1031",
'title' =>"Social Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1032",
'title' =>"Social Psychology and Interaction", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1033",
'title' =>"Social Welfare", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1034",
'title' =>"Sociology of Culture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1035",
'title' =>"Sociology of Religion", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1036",
'title' =>"Software Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:315",
'hierarchy' =>"Computer Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1037",
'title' =>"Soil Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1038",
'title' =>"Somatic Bodywork and Related Therapeutic Practices", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:308",
'hierarchy' =>"Rehabilitation and Therapy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1039",
'title' =>"Soviet and Post-Soviet Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:330",
'hierarchy' =>"International and Area Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:104",
'title' =>"Curriculum and Instruction", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1040",
'title' =>"Space Vehicles", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:128",
'hierarchy' =>"Aerospace Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1041",
'title' =>"Spanish Linguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:63",
'hierarchy' =>"Spanish and Portuguese Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1042",
'title' =>"Spanish Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:63",
'hierarchy' =>"Spanish and Portuguese Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1043",
'title' =>"Spatial Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:329",
'hierarchy' =>"Geography",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1044",
'title' =>"Special Education Administration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:109",
'hierarchy' =>"Educational Administration and Supervision",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1045",
'title' =>"Special Functions", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:312",
'hierarchy' =>"Applied Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1046",
'title' =>"Speech and Hearing Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:290",
'hierarchy' =>"Communication Sciences and Disorders",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1047",
'title' =>"Speech and Rhetorical Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1048",
'title' =>"Speech Pathology and Audiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:290",
'hierarchy' =>"Communication Sciences and Disorders",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1049",
'title' =>"Sports Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:105",
'title' =>"Curriculum and Social Inquiry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1050",
'title' =>"Stars, Interstellar Medium and the Galaxy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:313",
'hierarchy' =>"Astrophysics and Astronomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1051",
'title' =>"Statistical Methodology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1052",
'title' =>"Statistical Models", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1053",
'title' =>"Statistical Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1054",
'title' =>"Statistical, Nonlinear, and Soft Matter Physics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:320",
'hierarchy' =>"Physics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1055",
'title' =>"Stomatognathic Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1056",
'title' =>"Stomatognathic System", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1057",
'title' =>"Stratigraphy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1058",
'title' =>"Structural Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:264",
'hierarchy' =>"Biochemistry, Biophysics, and Structural Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1059",
'title' =>"Structural Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:134",
'hierarchy' =>"Civil and Environmental Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:106",
'title' =>"Disability and Equity in Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1060",
'title' =>"Structural Materials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:140",
'hierarchy' =>"Materials Science and Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1061",
'title' =>"Structures and Materials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:128",
'hierarchy' =>"Aerospace Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1062",
'title' =>"Substance Abuse and Addiction", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:300",
'hierarchy' =>"Mental and Social Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1063",
'title' =>"Surgery", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1064",
'title' =>"Surgical Procedures, Operative", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:286",
'hierarchy' =>"Analytical, Diagnostic and Therapeutic Techniques and Equipment",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1065",
'title' =>"Survival Analysis", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1066",
'title' =>"Sustainability", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:317",
'hierarchy' =>"Environmental Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1067",
'title' =>"Syntax", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1068",
'title' =>"Systems and Communications", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:137",
'hierarchy' =>"Electrical and Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1069",
'title' =>"Systems and Integrative Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:131",
'hierarchy' =>"Biomedical Engineering and Bioengineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1070",
'title' =>"Systems and Integrative Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:283",
'hierarchy' =>"Physiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1071",
'title' =>"Systems Architecture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:315",
'hierarchy' =>"Computer Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1072",
'title' =>"Systems Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:145",
'hierarchy' =>"Operations Research, Systems Engineering and Industrial Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1073",
'title' =>"Systems Engineering and Multidisciplinary Design Optimization", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:128",
'hierarchy' =>"Aerospace Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1074",
'title' =>"Systems Neuroscience", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:280",
'hierarchy' =>"Neuroscience and Neurobiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1075",
'title' =>"Tectonics and Structure", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1076",
'title' =>"Telemedicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:295",
'hierarchy' =>"Health Information Technology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1077",
'title' =>"Terrestrial and Aquatic Ecology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:270",
'hierarchy' =>"Ecology and Evolutionary Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1078",
'title' =>"The Sun and the Solar System", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:313",
'hierarchy' =>"Astrophysics and Astronomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1079",
'title' =>"Theatre History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:66",
'hierarchy' =>"Theatre and Performance Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:108",
'title' =>"Education Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1080",
'title' =>"Theory and Algorithms", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:315",
'hierarchy' =>"Computer Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1081",
'title' =>"Theory and Criticism", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:44",
'hierarchy' =>"History of Art, Architecture, and Archaeology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1082",
'title' =>"Theory and Philosophy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1083",
'title' =>"Theory, Knowledge and Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1084",
'title' =>"Therapeutics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:286",
'hierarchy' =>"Analytical, Diagnostic and Therapeutic Techniques and Equipment",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1085",
'title' =>"Thermodynamics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:133",
'hierarchy' =>"Chemical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1086",
'title' =>"Tissues", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1087",
'title' =>"Tourism", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1088",
'title' =>"Toxicology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:282",
'hierarchy' =>"Pharmacology, Toxicology and Environmental Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1089",
'title' =>"Training and Development", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:81",
'hierarchy' =>"Human Resources Management",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:109",
'title' =>"Educational Administration and Supervision", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1090",
'title' =>"Translation Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:31",
'hierarchy' =>"Comparative Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1091",
'title' =>"Transport Phenomena", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:133",
'hierarchy' =>"Chemical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1092",
'title' =>"Transportation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1093",
'title' =>"Transportation Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:134",
'hierarchy' =>"Civil and Environmental Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1094",
'title' =>"Trauma", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1095",
'title' =>"Tribology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:141",
'hierarchy' =>"Mechanical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1096",
'title' =>"Typological Linguistics and Linguistic Diversity", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1097",
'title' =>"Unions", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:84",
'hierarchy' =>"Labor Relations",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1098",
'title' =>"United States History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1099",
'title' =>"University Extension", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:116",
'hierarchy' =>"Higher Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:11",
'title' =>"Architectural Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:1",
'hierarchy' =>"Architecture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:110",
'title' =>"Educational Assessment, Evaluation, and Research", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1100",
'title' =>"Urban Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:109",
'hierarchy' =>"Educational Administration and Supervision",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1101",
'title' =>"Urban Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1102",
'title' =>"Urogenital System", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1103",
'title' =>"Urology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1104",
'title' =>"Veterinary Anatomy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:311",
'hierarchy' =>"Veterinary Medicine",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1105",
'title' =>"Veterinary Infectious Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:311",
'hierarchy' =>"Veterinary Medicine",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1106",
'title' =>"Veterinary Microbiology and Immunobiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:311",
'hierarchy' =>"Veterinary Medicine",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1107",
'title' =>"Veterinary Pathology and Pathobiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:311",
'hierarchy' =>"Veterinary Medicine",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1108",
'title' =>"Veterinary Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:311",
'hierarchy' =>"Veterinary Medicine",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1109",
'title' =>"Veterinary Preventive Medicine, Epidemiology, and Public Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:311",
'hierarchy' =>"Veterinary Medicine",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:111",
'title' =>"Educational Leadership", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1110",
'title' =>"Veterinary Toxicology and Pharmacology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:311",
'hierarchy' =>"Veterinary Medicine",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1111",
'title' =>"Virology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:279",
'hierarchy' =>"Microbiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1112",
'title' =>"Virus Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1113",
'title' =>"Viruses", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:304",
'hierarchy' =>"Organisms",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1114",
'title' =>"Vision Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:131",
'hierarchy' =>"Biomedical Engineering and Bioengineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1115",
'title' =>"Visual Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:39",
'hierarchy' =>"Film and Media Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1116",
'title' =>"Vital and Health Statistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1117",
'title' =>"Viticulture and Oenology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:262",
'hierarchy' =>"Agriculture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1118",
'title' =>"VLSI and Circuits, Embedded and Hardware Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:137",
'hierarchy' =>"Electrical and Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1119",
'title' =>"Vocational Rehabilitation Counseling", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:308",
'hierarchy' =>"Rehabilitation and Therapy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:112",
'title' =>"Educational Methods", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1120",
'title' =>"Volcanology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1121",
'title' =>"Water Resource Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:317",
'hierarchy' =>"Environmental Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1122",
'title' =>"Weed Science Life Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:284",
'hierarchy' =>"Plant Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1123",
'title' =>"Women's Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1124",
'title' =>"Women's History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1125",
'title' =>"Women's Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:38",
'hierarchy' =>"Feminist, Gender, and Sexuality Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1126",
'title' =>"Wood Science and Pulp, Paper Technology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:273",
'hierarchy' =>"Forest Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1127",
'title' =>"Work, Economy and Organizations", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1128",
'title' =>"Yiddish Language and Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:45",
'hierarchy' =>"Jewish Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1129",
'title' =>"Zoology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:263",
'hierarchy' =>"Animal Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:113",
'title' =>"Educational Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1130",
'title' =>"Accessibility", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:107",
'hierarchy' =>"Disability and Equity in Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:1131",
'title' =>"Urban Studies and Planning", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:114",
'title' =>"Gifted Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:115",
'title' =>"Health and Physical Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:116",
'title' =>"Higher Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:117",
'title' =>"Home Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:118",
'title' =>"Humane Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:119",
'title' =>"Instructional Media Design", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:12",
'title' =>"Architectural History and Criticism", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:1",
'hierarchy' =>"Architecture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:120",
'title' =>"International and Comparative Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:121",
'title' =>"Liberal Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:122",
'title' =>"Online and Distance Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:123",
'title' =>"Science and Mathematics Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:124",
'title' =>"Social and Philosophical Foundations of Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:125",
'title' =>"Special Education and Teaching", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:126",
'title' =>"Student Counseling and Personnel Services", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:127",
'title' =>"Teacher Education and Professional Development", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:4",
'hierarchy' =>"Education",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:128",
'title' =>"Aerospace Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:129",
'title' =>"Automotive Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:13",
'title' =>"Architectural Technology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:1",
'hierarchy' =>"Architecture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:130",
'title' =>"Aviation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:131",
'title' =>"Biomedical Engineering and Bioengineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:132",
'title' =>"Bioresource and Agricultural Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:133",
'title' =>"Chemical Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:134",
'title' =>"Civil and Environmental Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:135",
'title' =>"Computational Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:136",
'title' =>"Computer Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:137",
'title' =>"Electrical and Computer Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:138",
'title' =>"Engineering Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:139",
'title' =>"Engineering Science and Materials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:14",
'title' =>"Construction Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:1",
'hierarchy' =>"Architecture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:140",
'title' =>"Materials Science and Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:141",
'title' =>"Mechanical Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:142",
'title' =>"Mining Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:143",
'title' =>"Nanoscience and Nanotechnology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:144",
'title' =>"Nuclear Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:145",
'title' =>"Operations Research, Systems Engineering and Industrial Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:146",
'title' =>"Risk Analysis", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:5",
'hierarchy' =>"Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:147",
'title' =>"Accounting Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:148",
'title' =>"Administrative Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:149",
'title' =>"Admiralty", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:15",
'title' =>"Cultural Resource Management and Policy Analysis", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:1",
'hierarchy' =>"Architecture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:150",
'title' =>"Agency", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:151",
'title' =>"Agriculture Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:152",
'title' =>"Air and Space Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:153",
'title' =>"Animal Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:154",
'title' =>"Antitrust and Trade Regulation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:155",
'title' =>"Banking and Finance Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:156",
'title' =>"Bankruptcy Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:157",
'title' =>"Business Organizations Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:158",
'title' =>"Civil Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:159",
'title' =>"Civil Procedure", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:16",
'title' =>"Environmental Design", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:1",
'hierarchy' =>"Architecture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:160",
'title' =>"Civil Rights and Discrimination", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:161",
'title' =>"Commercial Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:162",
'title' =>"Common Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:163",
'title' =>"Communications Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:164",
'title' =>"Comparative and Foreign Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:165",
'title' =>"Computer Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:166",
'title' =>"Conflict of Laws", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:167",
'title' =>"Constitutional Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:168",
'title' =>"Construction Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:169",
'title' =>"Consumer Protection Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:17",
'title' =>"Historic Preservation and Conservation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:1",
'hierarchy' =>"Architecture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:170",
'title' =>"Contracts", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:171",
'title' =>"Courts", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:172",
'title' =>"Criminal Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:173",
'title' =>"Criminal Procedure", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:174",
'title' =>"Disability Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:175",
'title' =>"Disaster Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:176",
'title' =>"Dispute Resolution and Arbitration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:177",
'title' =>"Education Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:178",
'title' =>"Elder Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:179",
'title' =>"Election Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:18",
'title' =>"Interior Architecture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:1",
'hierarchy' =>"Architecture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:180",
'title' =>"Energy and Utilities Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:181",
'title' =>"Entertainment, Arts, and Sports Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:182",
'title' =>"Environmental Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:183",
'title' =>"Estates and Trusts", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:184",
'title' =>"European Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:185",
'title' =>"Evidence", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:186",
'title' =>"Family Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:187",
'title' =>"First Amendment", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:188",
'title' =>"Food and Drug Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:189",
'title' =>"Fourteenth Amendment", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:19",
'title' =>"Landscape Architecture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:1",
'hierarchy' =>"Architecture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:190",
'title' =>"Fourth Amendment", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:191",
'title' =>"Gaming Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:192",
'title' =>"Government Contracts", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:193",
'title' =>"Health Law and Policy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:194",
'title' =>"Housing Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:195",
'title' =>"Human Rights Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:196",
'title' =>"Immigration Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:197",
'title' =>"Indian and Aboriginal Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:198",
'title' =>"Insurance Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:199",
'title' =>"Intellectual Property Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:2",
'title' =>"Arts and Humanities", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"NULL",
'hierarchy' =>"NULL",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:20",
'title' =>"Urban, Community and Regional Planning", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:1",
'hierarchy' =>"Architecture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:200",
'title' =>"International Humanitarian Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:201",
'title' =>"International Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:202",
'title' =>"International Trade Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:203",
'title' =>"Internet Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:204",
'title' =>"Judges", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:205",
'title' =>"Jurisdiction", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:206",
'title' =>"Jurisprudence", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:207",
'title' =>"Juvenile Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:208",
'title' =>"Labor and Employment Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:209",
'title' =>"Land Use Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:21",
'title' =>"African Languages and Societies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:210",
'title' =>"Law and Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:211",
'title' =>"Law and Gender", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:212",
'title' =>"Law and Philosophy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:213",
'title' =>"Law and Politics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:214",
'title' =>"Law and Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:215",
'title' =>"Law and Race", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:216",
'title' =>"Law and Society", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:217",
'title' =>"Law Enforcement and Corrections", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:218",
'title' =>"Law of the Sea", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:219",
'title' =>"Legal Biography", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:22",
'title' =>"American Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:220",
'title' =>"Legal Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:221",
'title' =>"Legal Ethics and Professional Responsibility", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:222",
'title' =>"Legal History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:223",
'title' =>"Legal Profession", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:224",
'title' =>"Legal Remedies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:225",
'title' =>"Legal Writing and Research", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:226",
'title' =>"Legislation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:227",
'title' =>"Litigation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:228",
'title' =>"Marketing Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:229",
'title' =>"Medical Jurisprudence", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:23",
'title' =>"Appalachian Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:230",
'title' =>"Military, War, and Peace", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:231",
'title' =>"National Security Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:232",
'title' =>"Natural Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:233",
'title' =>"Natural Resources Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:234",
'title' =>"Nonprofit Organizations Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:235",
'title' =>"Oil, Gas, and Mineral Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:236",
'title' =>"Organizations Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:237",
'title' =>"President/Executive Department", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:238",
'title' =>"Privacy Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:239",
'title' =>"Property Law and Real Estate", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:24",
'title' =>"Art and Design", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:240",
'title' =>"Public Law and Legal Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:241",
'title' =>"Religion Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:242",
'title' =>"Retirement Security Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:243",
'title' =>"Rule of Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:244",
'title' =>"Science and Technology Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:245",
'title' =>"Second Amendment", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:246",
'title' =>"Secured Transactions", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:247",
'title' =>"Securities Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:248",
'title' =>"Sexuality and the Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:249",
'title' =>"Social Welfare Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:25",
'title' =>"Art Practice", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:250",
'title' =>"State and Local Government Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:251",
'title' =>"Supreme Court of the United States", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:252",
'title' =>"Tax Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:253",
'title' =>"Taxation-Federal", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:254",
'title' =>"Taxation-Federal Estate and Gift", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:255",
'title' =>"Taxation-State and Local", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:256",
'title' =>"Taxation-Transnational", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:257",
'title' =>"Torts", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:258",
'title' =>"Transnational Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:259",
'title' =>"Transportation Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:26",
'title' =>"Audio Arts and Acoustics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:260",
'title' =>"Water Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:261",
'title' =>"Workers' Compensation Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:6",
'hierarchy' =>"Law",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:262",
'title' =>"Agriculture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:263",
'title' =>"Animal Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:264",
'title' =>"Biochemistry, Biophysics, and Structural Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:265",
'title' =>"Biodiversity", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:266",
'title' =>"Bioinformatics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:267",
'title' =>"Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:268",
'title' =>"Biotechnology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:269",
'title' =>"Cell and Developmental Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:27",
'title' =>"Australian Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:270",
'title' =>"Ecology and Evolutionary Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:271",
'title' =>"Entomology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:272",
'title' =>"Food Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:273",
'title' =>"Forest Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:274",
'title' =>"Genetics and Genomics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:275",
'title' =>"Immunology and Infectious Disease", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:276",
'title' =>"Kinesiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:277",
'title' =>"Laboratory and Basic Science Research", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:278",
'title' =>"Marine Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:279",
'title' =>"Microbiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:28",
'title' =>"Basque Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:280",
'title' =>"Neuroscience and Neurobiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:281",
'title' =>"Nutrition", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:282",
'title' =>"Pharmacology, Toxicology and Environmental Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:283",
'title' =>"Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:284",
'title' =>"Plant Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:7",
'hierarchy' =>"Life Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:285",
'title' =>"Alternative and Complementary Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:286",
'title' =>"Analytical, Diagnostic and Therapeutic Techniques and Equipment", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:287",
'title' =>"Anatomy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:288",
'title' =>"Bioethics and Medical Ethics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:289",
'title' =>"Chemicals and Drugs", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:29",
'title' =>"Celtic Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:290",
'title' =>"Communication Sciences and Disorders", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:291",
'title' =>"Dentistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:292",
'title' =>"Dietetics and Clinical Nutrition", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:293",
'title' =>"Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:294",
'title' =>"Health and Medical Administration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:295",
'title' =>"Health Information Technology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:296",
'title' =>"Medical Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:297",
'title' =>"Medical Humanities", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:298",
'title' =>"Medical Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:299",
'title' =>"Medical Specialties", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:3",
'title' =>"Business", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"NULL",
'hierarchy' =>"NULL",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:30",
'title' =>"Classics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:300",
'title' =>"Mental and Social Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:301",
'title' =>"Nanotechnology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:302",
'title' =>"Nursing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:303",
'title' =>"Optometry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:304",
'title' =>"Organisms", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:305",
'title' =>"Pharmacy and Pharmaceutical Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:306",
'title' =>"Psychiatry and Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:307",
'title' =>"Public Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:308",
'title' =>"Rehabilitation and Therapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:309",
'title' =>"Sports Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:31",
'title' =>"Comparative Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:310",
'title' =>"Translational Medical Research", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:311",
'title' =>"Veterinary Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:8",
'hierarchy' =>"Medicine and Health Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:312",
'title' =>"Applied Mathematics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:9",
'hierarchy' =>"Physical Sciences and Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:313",
'title' =>"Astrophysics and Astronomy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:9",
'hierarchy' =>"Physical Sciences and Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:314",
'title' =>"Chemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:9",
'hierarchy' =>"Physical Sciences and Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:315",
'title' =>"Computer Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:9",
'hierarchy' =>"Physical Sciences and Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:316",
'title' =>"Earth Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:9",
'hierarchy' =>"Physical Sciences and Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:317",
'title' =>"Environmental Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:9",
'hierarchy' =>"Physical Sciences and Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:318",
'title' =>"Mathematics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:9",
'hierarchy' =>"Physical Sciences and Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:319",
'title' =>"Oceanography and Atmospheric Sciences and Meteorology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:9",
'hierarchy' =>"Physical Sciences and Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:32",
'title' =>"Creative Writing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:320",
'title' =>"Physics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:9",
'hierarchy' =>"Physical Sciences and Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:321",
'title' =>"Statistics and Probability", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:9",
'hierarchy' =>"Physical Sciences and Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:322",
'title' =>"Agricultural and Resource Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:323",
'title' =>"Animal Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:324",
'title' =>"Anthropology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:325",
'title' =>"Communication", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:326",
'title' =>"Counseling", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:327",
'title' =>"Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:328",
'title' =>"Environmental Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:329",
'title' =>"Geography", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:33",
'title' =>"Digital Humanities", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:330",
'title' =>"International and Area Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:331",
'title' =>"Leadership Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:332",
'title' =>"Legal Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:333",
'title' =>"Leisure Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:334",
'title' =>"Library and Information Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:335",
'title' =>"Linguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:336",
'title' =>"Organization Development", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:337",
'title' =>"Political Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:338",
'title' =>"Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:339",
'title' =>"Public Affairs, Public Policy and Public Administration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:34",
'title' =>"Dutch Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:340",
'title' =>"Science and Technology Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:341",
'title' =>"Social Statistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:342",
'title' =>"Social Work", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:343",
'title' =>"Sociology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:344",
'title' =>"Sports Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:10",
'hierarchy' =>"Social and Behavioral Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:345",
'title' =>"Italian Language and Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:346",
'title' =>"Photography", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:347",
'title' =>"Acoustics, Dynamics, and Controls", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:141",
'hierarchy' =>"Mechanical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:348",
'title' =>"Acting", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:66",
'hierarchy' =>"Theatre and Performance Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:349",
'title' =>"Adult and Continuing Education Administration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:109",
'hierarchy' =>"Educational Administration and Supervision",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:35",
'title' =>"East Asian Languages and Societies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:350",
'title' =>"Adult and Continuing Education and Teaching", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:127",
'hierarchy' =>"Teacher Education and Professional Development",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:351",
'title' =>"Aerodynamics and Fluid Mechanics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:128",
'hierarchy' =>"Aerospace Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:352",
'title' =>"Aeronautical Vehicles", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:128",
'hierarchy' =>"Aerospace Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:353",
'title' =>"African American Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:55",
'hierarchy' =>"Race, Ethnicity and Post-Colonial Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:354",
'title' =>"African History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:355",
'title' =>"African Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:330",
'hierarchy' =>"International and Area Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:356",
'title' =>"Agricultural Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:262",
'hierarchy' =>"Agriculture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:357",
'title' =>"Agricultural Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:262",
'hierarchy' =>"Agriculture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:358",
'title' =>"Agricultural Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:284",
'hierarchy' =>"Plant Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:359",
'title' =>"Agronomy and Crop Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:284",
'hierarchy' =>"Plant Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:36",
'title' =>"English Language and Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:360",
'title' =>"Algae", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:304",
'hierarchy' =>"Organisms",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:361",
'title' =>"Algebra", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:318",
'hierarchy' =>"Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:362",
'title' =>"Algebraic Geometry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:318",
'hierarchy' =>"Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:363",
'title' =>"Allergy and Immunology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:364",
'title' =>"American Art and Architecture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:44",
'hierarchy' =>"History of Art, Architecture, and Archaeology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:365",
'title' =>"American Film Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:22",
'hierarchy' =>"American Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:366",
'title' =>"American Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:22",
'hierarchy' =>"American Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:367",
'title' =>"American Material Culture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:22",
'hierarchy' =>"American Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:368",
'title' =>"American Politics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:337",
'hierarchy' =>"Political Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:369",
'title' =>"American Popular Culture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:22",
'hierarchy' =>"American Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:37",
'title' =>"European Languages and Societies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:370",
'title' =>"Amino Acids, Peptides, and Proteins", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:371",
'title' =>"Analysis", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:318",
'hierarchy' =>"Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:372",
'title' =>"Analytical Chemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:314",
'hierarchy' =>"Chemistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:373",
'title' =>"Ancient History, Greek and Roman through Late Antiquity", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:30",
'hierarchy' =>"Classics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:374",
'title' =>"Ancient Philosophy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:30",
'hierarchy' =>"Classics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:375",
'title' =>"Ancient, Medieval, Renaissance and Baroque Art and Architecture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:44",
'hierarchy' =>"History of Art, Architecture, and Archaeology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:376",
'title' =>"Anesthesia and Analgesia", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:286",
'hierarchy' =>"Analytical, Diagnostic and Therapeutic Techniques and Equipment",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:377",
'title' =>"Anesthesiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:378",
'title' =>"Animal Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:379",
'title' =>"Animal Structures", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:38",
'title' =>"Feminist, Gender, and Sexuality Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:380",
'title' =>"Animal-Assisted Therapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:300",
'hierarchy' =>"Mental and Social Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:381",
'title' =>"Animals", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:304",
'hierarchy' =>"Organisms",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:382",
'title' =>"Anthropological Linguistics and Sociolinguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:383",
'title' =>"Apiculture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:262",
'hierarchy' =>"Agriculture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:384",
'title' =>"Applied Behavior Analysis", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:385",
'title' =>"Applied Linguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:386",
'title' =>"Applied Mechanics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:141",
'hierarchy' =>"Mechanical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:387",
'title' =>"Applied Statistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:388",
'title' =>"Aquaculture and Fisheries", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:263",
'hierarchy' =>"Animal Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:389",
'title' =>"Archaea", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:304",
'hierarchy' =>"Organisms",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:39",
'title' =>"Film and Media Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:390",
'title' =>"Archaeological Anthropology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:324",
'hierarchy' =>"Anthropology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:391",
'title' =>"Archival Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:334",
'hierarchy' =>"Library and Information Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:392",
'title' =>"Art and Materials Conservation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:393",
'title' =>"Art Direction", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:87",
'hierarchy' =>"Marketing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:394",
'title' =>"Art Therapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:300",
'hierarchy' =>"Mental and Social Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:395",
'title' =>"Artificial Intelligence and Robotics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:315",
'hierarchy' =>"Computer Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:396",
'title' =>"Asian American Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:55",
'hierarchy' =>"Race, Ethnicity and Post-Colonial Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:397",
'title' =>"Asian Art and Architecture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:44",
'hierarchy' =>"History of Art, Architecture, and Archaeology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:398",
'title' =>"Asian History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:399",
'title' =>"Asian Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:330",
'hierarchy' =>"International and Area Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:4",
'title' =>"Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"NULL",
'hierarchy' =>"NULL",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:40",
'title' =>"Fine Arts", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:400",
'title' =>"Astrodynamics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:128",
'hierarchy' =>"Aerospace Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:401",
'title' =>"Atmospheric Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:319",
'hierarchy' =>"Oceanography and Atmospheric Sciences and Meteorology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:402",
'title' =>"Atomic, Molecular and Optical Physics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:320",
'hierarchy' =>"Physics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:403",
'title' =>"Aviation Safety and Security", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:130",
'hierarchy' =>"Aviation",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:404",
'title' =>"Bacteria", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:304",
'hierarchy' =>"Organisms",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:405",
'title' =>"Bacterial Infections and Mycoses", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:406",
'title' =>"Bacteriology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:279",
'hierarchy' =>"Microbiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:407",
'title' =>"Behavior and Behavior Mechanisms", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:306",
'hierarchy' =>"Psychiatry and Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:408",
'title' =>"Behavior and Ethology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:270",
'hierarchy' =>"Ecology and Evolutionary Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:409",
'title' =>"Behavioral Disciplines and Activities", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:306",
'hierarchy' =>"Psychiatry and Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:41",
'title' =>"French and Francophone Language and Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:410",
'title' =>"Behavioral Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:411",
'title' =>"Behavioral Neurobiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:280",
'hierarchy' =>"Neuroscience and Neurobiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:412",
'title' =>"Benefits and Compensation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:81",
'hierarchy' =>"Human Resources Management",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:413",
'title' =>"Biblical Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:414",
'title' =>"Biochemical and Biomolecular Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:133",
'hierarchy' =>"Chemical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:415",
'title' =>"Biochemical Phenomena, Metabolism, and Nutrition", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:416",
'title' =>"Biochemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:264",
'hierarchy' =>"Biochemistry, Biophysics, and Structural Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:417",
'title' =>"Bioelectrical and Neuroengineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:131",
'hierarchy' =>"Biomedical Engineering and Bioengineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:418",
'title' =>"Biogeochemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:419",
'title' =>"Bioimaging and Biomedical Optics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:131",
'hierarchy' =>"Biomedical Engineering and Bioengineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:42",
'title' =>"German Language and Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:420",
'title' =>"Biological and Chemical Physics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:320",
'hierarchy' =>"Physics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:421",
'title' =>"Biological and Physical Anthropology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:324",
'hierarchy' =>"Anthropology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:422",
'title' =>"Biological Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:131",
'hierarchy' =>"Biomedical Engineering and Bioengineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:423",
'title' =>"Biological Factors", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:424",
'title' =>"Biological Phenomena, Cell Phenomena, and Immunity", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:425",
'title' =>"Biological Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:426",
'title' =>"Biology and Biomimetic Materials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:140",
'hierarchy' =>"Materials Science and Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:427",
'title' =>"Biomaterials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:131",
'hierarchy' =>"Biomedical Engineering and Bioengineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:428",
'title' =>"Biomechanical Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:141",
'hierarchy' =>"Mechanical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:429",
'title' =>"Biomechanics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:276",
'hierarchy' =>"Kinesiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:43",
'title' =>"History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:430",
'title' =>"Biomechanics and Biotransport", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:131",
'hierarchy' =>"Biomedical Engineering and Bioengineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:431",
'title' =>"Biomedical", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:137",
'hierarchy' =>"Electrical and Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:432",
'title' =>"Biomedical and Dental Materials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:433",
'title' =>"Biomedical Devices and Instrumentation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:131",
'hierarchy' =>"Biomedical Engineering and Bioengineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:434",
'title' =>"Biometry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:435",
'title' =>"Biophysics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:264",
'hierarchy' =>"Biochemistry, Biophysics, and Structural Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:436",
'title' =>"Biosecurity", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:262",
'hierarchy' =>"Agriculture",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:437",
'title' =>"Biostatistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:438",
'title' =>"Body Regions", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:439",
'title' =>"Book and Paper", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:44",
'title' =>"History of Art, Architecture, and Archaeology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:440",
'title' =>"Botany", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:284",
'hierarchy' =>"Plant Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:441",
'title' =>"Broadcast and Video Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:442",
'title' =>"Buddhist Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:443",
'title' =>"Byzantine and Modern Greek", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:30",
'hierarchy' =>"Classics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:444",
'title' =>"Canadian History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:445",
'title' =>"Cancer Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:269",
'hierarchy' =>"Cell and Developmental Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:446",
'title' =>"Carbohydrates", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:447",
'title' =>"Cardiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:448",
'title' =>"Cardiovascular Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:449",
'title' =>"Cardiovascular System", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:45",
'title' =>"Jewish Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:450",
'title' =>"Caribbean Languages and Societies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:46",
'hierarchy' =>"Latin American Languages and Societies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:451",
'title' =>"Cataloging and Metadata", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:334",
'hierarchy' =>"Library and Information Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:452",
'title' =>"Catalysis and Reaction Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:133",
'hierarchy' =>"Chemical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:453",
'title' =>"Categorical Data Analysis", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:454",
'title' =>"Catholic Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:455",
'title' =>"Cell Anatomy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:269",
'hierarchy' =>"Cell and Developmental Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:456",
'title' =>"Cell Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:269",
'hierarchy' =>"Cell and Developmental Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:457",
'title' =>"Cells", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:458",
'title' =>"Cellular and Molecular Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:283",
'hierarchy' =>"Physiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:459",
'title' =>"Ceramic Arts", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:46",
'title' =>"Latin American Languages and Societies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:460",
'title' =>"Ceramic Materials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:140",
'hierarchy' =>"Materials Science and Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:461",
'title' =>"Chemical Actions and Uses", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:462",
'title' =>"Chemical and Pharmacologic Phenomena", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:463",
'title' =>"Chicana/o Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:55",
'hierarchy' =>"Race, Ethnicity and Post-Colonial Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:464",
'title' =>"Child Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:465",
'title' =>"Children's and Young Adult Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:36",
'hierarchy' =>"English Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:466",
'title' =>"Chinese Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:35",
'hierarchy' =>"East Asian Languages and Societies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:467",
'title' =>"Christian Denominations and Sects", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:468",
'title' =>"Christianity", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:469",
'title' =>"Circulatory and Respiratory Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:47",
'title' =>"Medieval Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:470",
'title' =>"Civic and Community Engagement", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:471",
'title' =>"Civil Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:134",
'hierarchy' =>"Civil and Environmental Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:472",
'title' =>"Classical Archaeology and Art History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:30",
'hierarchy' =>"Classics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:473",
'title' =>"Classical Literature and Philology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:30",
'hierarchy' =>"Classics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:474",
'title' =>"Climate", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:319",
'hierarchy' =>"Oceanography and Atmospheric Sciences and Meteorology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:475",
'title' =>"Clinical and Medical Social Work", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:300",
'hierarchy' =>"Mental and Social Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:476",
'title' =>"Clinical Epidemiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:477",
'title' =>"Clinical Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:478",
'title' =>"Clinical Trials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:479",
'title' =>"Cognition and Perception", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:48",
'title' =>"Modern Languages", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:480",
'title' =>"Cognitive Behavioral Therapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:300",
'hierarchy' =>"Mental and Social Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:481",
'title' =>"Cognitive Neuroscience", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:280",
'hierarchy' =>"Neuroscience and Neurobiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:482",
'title' =>"Cognitive Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:483",
'title' =>"Collection Development and Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:334",
'hierarchy' =>"Library and Information Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:484",
'title' =>"Collective Bargaining", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:84",
'hierarchy' =>"Labor Relations",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:485",
'title' =>"Communication Technology and New Media", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:486",
'title' =>"Community College Education Administration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:109",
'hierarchy' =>"Educational Administration and Supervision",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:487",
'title' =>"Community Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:300",
'hierarchy' =>"Mental and Social Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:488",
'title' =>"Community Health and Preventive Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:489",
'title' =>"Community Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:49",
'title' =>"Modern Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:490",
'title' =>"Community-based Learning", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:491",
'title' =>"Community-based Research", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:492",
'title' =>"Comparative and Evolutionary Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:283",
'hierarchy' =>"Physiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:493",
'title' =>"Comparative and Historical Linguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:494",
'title' =>"Comparative and Laboratory Animal Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:311",
'hierarchy' =>"Veterinary Medicine",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:495",
'title' =>"Comparative Methodologies and Theories", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:496",
'title' =>"Comparative Nutrition", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:281",
'hierarchy' =>"Nutrition",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:497",
'title' =>"Comparative Philosophy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:498",
'title' =>"Comparative Politics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:337",
'hierarchy' =>"Political Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:499",
'title' =>"Complex Fluids", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:133",
'hierarchy' =>"Chemical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:5",
'title' =>"Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"NULL",
'hierarchy' =>"NULL",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:50",
'title' =>"Museum Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:500",
'title' =>"Complex Mixtures", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:501",
'title' =>"Composition", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:51",
'hierarchy' =>"Music",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:502",
'title' =>"Computational Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:274",
'hierarchy' =>"Genetics and Genomics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:503",
'title' =>"Computational Linguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:504",
'title' =>"Computational Neuroscience", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:280",
'hierarchy' =>"Neuroscience and Neurobiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:505",
'title' =>"Computer and Systems Architecture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:136",
'hierarchy' =>"Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:506",
'title' =>"Computer Security", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:315",
'hierarchy' =>"Computer Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:507",
'title' =>"Computer-Aided Engineering and Design", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:141",
'hierarchy' =>"Mechanical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:508",
'title' =>"Condensed Matter Physics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:320",
'hierarchy' =>"Physics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:509",
'title' =>"Congenital, Hereditary, and Neonatal Diseases and Abnormalities", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:51",
'title' =>"Music", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:510",
'title' =>"Construction Engineering and Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:134",
'hierarchy' =>"Civil and Environmental Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:511",
'title' =>"Contemporary Art", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:44",
'hierarchy' =>"History of Art, Architecture, and Archaeology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:512",
'title' =>"Continental Philosophy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:513",
'title' =>"Control Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:312",
'hierarchy' =>"Applied Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:514",
'title' =>"Controls and Control Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:137",
'hierarchy' =>"Electrical and Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:515",
'title' =>"Cosmochemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:516",
'title' =>"Cosmology, Relativity, and Gravity", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:313",
'hierarchy' =>"Astrophysics and Astronomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:517",
'title' =>"Counseling Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:518",
'title' =>"Counselor Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:326",
'hierarchy' =>"Counseling",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:519",
'title' =>"Criminology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:52",
'title' =>"Near Eastern Languages and Societies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:520",
'title' =>"Criminology and Criminal Justice", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:332",
'hierarchy' =>"Legal Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:521",
'title' =>"Critical and Cultural Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:522",
'title' =>"Critical Care", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:523",
'title' =>"Critical Care Nursing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:302",
'hierarchy' =>"Nursing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:524",
'title' =>"Cultural History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:525",
'title' =>"Dairy Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:263",
'hierarchy' =>"Animal Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:526",
'title' =>"Dance", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:66",
'hierarchy' =>"Theatre and Performance Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:527",
'title' =>"Dance Movement Therapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:306",
'hierarchy' =>"Psychiatry and Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:528",
'title' =>"Data Storage Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:136",
'hierarchy' =>"Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:529",
'title' =>"Databases and Information Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:315",
'hierarchy' =>"Computer Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:53",
'title' =>"Pacific Islands Languages and Societies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:530",
'title' =>"Defense and Security Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:531",
'title' =>"Demography, Population, and Ecology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:532",
'title' =>"Dental Hygiene", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:291",
'hierarchy' =>"Dentistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:533",
'title' =>"Dental Materials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:291",
'hierarchy' =>"Dentistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:534",
'title' =>"Dental Public Health and Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:291",
'hierarchy' =>"Dentistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:535",
'title' =>"Dermatology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:536",
'title' =>"Desert Ecology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:270",
'hierarchy' =>"Ecology and Evolutionary Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:537",
'title' =>"Design of Experiments and Sample Surveys", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:538",
'title' =>"Developmental Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:269",
'hierarchy' =>"Cell and Developmental Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:539",
'title' =>"Developmental Neuroscience", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:280",
'hierarchy' =>"Neuroscience and Neurobiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:54",
'title' =>"Philosophy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:540",
'title' =>"Developmental Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:541",
'title' =>"Diagnosis", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:286",
'hierarchy' =>"Analytical, Diagnostic and Therapeutic Techniques and Equipment",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:542",
'title' =>"Digestive System", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:543",
'title' =>"Digestive System Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:544",
'title' =>"Digestive, Oral, and Skin Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:545",
'title' =>"Digital Circuits", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:136",
'hierarchy' =>"Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:546",
'title' =>"Digital Communications and Networking", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:136",
'hierarchy' =>"Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:547",
'title' =>"Diplomatic History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:548",
'title' =>"Discourse and Text Linguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:549",
'title' =>"Discrete Mathematics and Combinatorics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:318",
'hierarchy' =>"Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:55",
'title' =>"Race, Ethnicity and Post-Colonial Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:550",
'title' =>"Disease Modeling", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:551",
'title' =>"Disorders of Environmental Origin", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:552",
'title' =>"Domestic and Intimate Partner Violence", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:553",
'title' =>"Dramatic Literature, Criticism and Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:66",
'hierarchy' =>"Theatre and Performance Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:554",
'title' =>"Dynamic Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:312",
'hierarchy' =>"Applied Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:555",
'title' =>"Dynamical Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:318",
'hierarchy' =>"Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:556",
'title' =>"Dynamics and Dynamical Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:139",
'hierarchy' =>"Engineering Science and Materials",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:557",
'title' =>"Eastern European Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:330",
'hierarchy' =>"International and Area Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:558",
'title' =>"Econometrics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:559",
'title' =>"Economic History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:56",
'title' =>"Radio", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:560",
'title' =>"Economic Policy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:561",
'title' =>"Economic Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:562",
'title' =>"Education Policy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:563",
'title' =>"Educational Sociology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:564",
'title' =>"Electrical and Electronics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:137",
'hierarchy' =>"Electrical and Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:565",
'title' =>"Electro-Mechanical Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:141",
'hierarchy' =>"Mechanical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:566",
'title' =>"Electromagnetics and Photonics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:137",
'hierarchy' =>"Electrical and Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:567",
'title' =>"Electronic Devices and Semiconductor Manufacturing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:137",
'hierarchy' =>"Electrical and Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:568",
'title' =>"Elementary and Middle and Secondary", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:109",
'hierarchy' =>"Educational Administration and Supervision",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:569",
'title' =>"Elementary Education and Teaching", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:127",
'hierarchy' =>"Teacher Education and Professional Development",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:57",
'title' =>"Reading and Language", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:570",
'title' =>"Elementary Particles and Fields and String Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:320",
'hierarchy' =>"Physics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:571",
'title' =>"Embryonic Structures", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:572",
'title' =>"Emergency and Disaster Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:573",
'title' =>"Emergency Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:574",
'title' =>"Endocrine System", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:575",
'title' =>"Endocrine System Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:576",
'title' =>"Endocrinology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:283",
'hierarchy' =>"Physiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:577",
'title' =>"Endocrinology, Diabetes, and Metabolism", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:578",
'title' =>"Endodontics and Endodontology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:291",
'hierarchy' =>"Dentistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:579",
'title' =>"Energy Policy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:58",
'title' =>"Religion", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:580",
'title' =>"Energy Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:141",
'hierarchy' =>"Mechanical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:581",
'title' =>"Engineering Mechanics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:139",
'hierarchy' =>"Engineering Science and Materials",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:582",
'title' =>"Engineering Physics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:320",
'hierarchy' =>"Physics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:583",
'title' =>"Environmental Chemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:314",
'hierarchy' =>"Chemistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:584",
'title' =>"Environmental Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:317",
'hierarchy' =>"Environmental Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:585",
'title' =>"Environmental Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:134",
'hierarchy' =>"Civil and Environmental Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:586",
'title' =>"Environmental Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:282",
'hierarchy' =>"Pharmacology, Toxicology and Environmental Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:587",
'title' =>"Environmental Health and Protection", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:317",
'hierarchy' =>"Environmental Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:588",
'title' =>"Environmental Indicators and Impact Assessment", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:317",
'hierarchy' =>"Environmental Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:589",
'title' =>"Environmental Microbiology and Microbial Ecology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:279",
'hierarchy' =>"Microbiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:59",
'title' =>"Rhetoric and Composition", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:590",
'title' =>"Environmental Monitoring", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:317",
'hierarchy' =>"Environmental Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:591",
'title' =>"Environmental Policy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:592",
'title' =>"Environmental Public Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:593",
'title' =>"Enzymes and Coenzymes", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:594",
'title' =>"Epidemiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:595",
'title' =>"Epistemology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:596",
'title' =>"Equipment and Supplies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:286",
'hierarchy' =>"Analytical, Diagnostic and Therapeutic Techniques and Equipment",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:597",
'title' =>"Ergonomics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:145",
'hierarchy' =>"Operations Research, Systems Engineering and Industrial Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:598",
'title' =>"Esthetics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:599",
'title' =>"Ethics and Political Philosophy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:6",
'title' =>"Law", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"NULL",
'hierarchy' =>"NULL",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:60",
'title' =>"Scandinavian Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:600",
'title' =>"Ethics in Religion", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:601",
'title' =>"Ethnic Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:55",
'hierarchy' =>"Race, Ethnicity and Post-Colonial Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:602",
'title' =>"Ethnomusicology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:51",
'hierarchy' =>"Music",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:603",
'title' =>"European History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:604",
'title' =>"Evolution", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:270",
'hierarchy' =>"Ecology and Evolutionary Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:605",
'title' =>"Exercise Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:283",
'hierarchy' =>"Physiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:606",
'title' =>"Exercise Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:276",
'hierarchy' =>"Kinesiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:607",
'title' =>"Expeditionary Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:276",
'hierarchy' =>"Kinesiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:608",
'title' =>"Experimental Analysis of Behavior", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:609",
'title' =>"External Galaxies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:313",
'hierarchy' =>"Astrophysics and Astronomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:61",
'title' =>"Slavic Languages and Societies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:610",
'title' =>"Eye Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:611",
'title' =>"Family Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:612",
'title' =>"Family Practice Nursing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:302",
'hierarchy' =>"Nursing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:613",
'title' =>"Family, Life Course, and Society", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:614",
'title' =>"Fashion Design", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:615",
'title' =>"Female Urogenital Diseases and Pregnancy Complications", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:616",
'title' =>"Feminist Philosophy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:617",
'title' =>"Fiber, Textile, and Weaving Arts", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:618",
'title' =>"Fiction", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:32",
'hierarchy' =>"Creative Writing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:619",
'title' =>"Film Production", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:39",
'hierarchy' =>"Film and Media Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:62",
'title' =>"South and Southeast Asian Languages and Societies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:620",
'title' =>"Finance", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:621",
'title' =>"First and Second Language Acquisition", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:622",
'title' =>"Fluid Dynamics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:320",
'hierarchy' =>"Physics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:623",
'title' =>"Fluids and Secretions", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:624",
'title' =>"Folklore", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:324",
'hierarchy' =>"Anthropology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:625",
'title' =>"Food and Beverage Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:80",
'hierarchy' =>"Hospitality Administration and Management",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:626",
'title' =>"Food Biotechnology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:272",
'hierarchy' =>"Food Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:627",
'title' =>"Food Chemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:272",
'hierarchy' =>"Food Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:628",
'title' =>"Food Microbiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:272",
'hierarchy' =>"Food Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:629",
'title' =>"Food Processing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:272",
'hierarchy' =>"Food Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:63",
'title' =>"Spanish and Portuguese Language and Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:630",
'title' =>"Food Security", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:322",
'hierarchy' =>"Agricultural and Resource Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:631",
'title' =>"Forensic Science and Technology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:332",
'hierarchy' =>"Legal Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:632",
'title' =>"Forest Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:273",
'hierarchy' =>"Forest Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:633",
'title' =>"Forest Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:273",
'hierarchy' =>"Forest Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:634",
'title' =>"French and Francophone Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:41",
'hierarchy' =>"French and Francophone Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:635",
'title' =>"French Linguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:41",
'hierarchy' =>"French and Francophone Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:636",
'title' =>"Fresh Water Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:319",
'hierarchy' =>"Oceanography and Atmospheric Sciences and Meteorology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:637",
'title' =>"Fruit Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:284",
'hierarchy' =>"Plant Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:638",
'title' =>"Fungi", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:304",
'hierarchy' =>"Organisms",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:639",
'title' =>"Game Design", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:64",
'title' =>"Technical and Professional Writing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:640",
'title' =>"Gaming and Casino Operations Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:80",
'hierarchy' =>"Hospitality Administration and Management",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:641",
'title' =>"Gastroenterology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:642",
'title' =>"Gender and Sexuality", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:643",
'title' =>"Gender, Race, Sexuality, and Ethnicity in Communication", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:644",
'title' =>"Genealogy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:645",
'title' =>"Genetic Phenomena", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:646",
'title' =>"Genetic Processes", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:647",
'title' =>"Genetic Structures", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:648",
'title' =>"Genetics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:274",
'hierarchy' =>"Genetics and Genomics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:649",
'title' =>"Genomics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:274",
'hierarchy' =>"Genetics and Genomics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:65",
'title' =>"Television", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:650",
'title' =>"Geochemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:651",
'title' =>"Geographic Information Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:329",
'hierarchy' =>"Geography",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:652",
'title' =>"Geology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:653",
'title' =>"Geometry and Topology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:318",
'hierarchy' =>"Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:654",
'title' =>"Geomorphology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:655",
'title' =>"Geophysics and Seismology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:656",
'title' =>"Geotechnical Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:134",
'hierarchy' =>"Civil and Environmental Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:657",
'title' =>"Geriatric Nursing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:302",
'hierarchy' =>"Nursing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:658",
'title' =>"Geriatrics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:659",
'title' =>"German Linguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:42",
'hierarchy' =>"German Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:66",
'title' =>"Theatre and Performance Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:2",
'hierarchy' =>"Arts and Humanities",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:660",
'title' =>"German Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:42",
'hierarchy' =>"German Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:661",
'title' =>"Gerontology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:662",
'title' =>"Glaciology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:663",
'title' =>"Graphic Communications", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:664",
'title' =>"Graphic Design", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:665",
'title' =>"Graphics and Human Computer Interfaces", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:315",
'hierarchy' =>"Computer Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:666",
'title' =>"Growth and Development", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:667",
'title' =>"Hardware Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:136",
'hierarchy' =>"Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:668",
'title' =>"Harmonic Analysis and Representation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:318",
'hierarchy' =>"Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:669",
'title' =>"Hawaiian Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:53",
'hierarchy' =>"Pacific Islands Languages and Societies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:67",
'title' =>"Accounting", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:670",
'title' =>"Health and Medical Physics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:671",
'title' =>"Health Communication", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:672",
'title' =>"Health Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:673",
'title' =>"Health Policy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:674",
'title' =>"Health Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:675",
'title' =>"Health Services Administration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:676",
'title' =>"Health Services Research", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:677",
'title' =>"Heat Transfer, Combustion", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:141",
'hierarchy' =>"Mechanical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:678",
'title' =>"Hematology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:679",
'title' =>"Hemic and Immune Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:68",
'title' =>"Advertising and Promotion Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:680",
'title' =>"Hemic and Lymphatic Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:681",
'title' =>"Hepatology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:682",
'title' =>"Heterocyclic Compounds", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:683",
'title' =>"Higher Education Administration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:109",
'hierarchy' =>"Educational Administration and Supervision",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:684",
'title' =>"Higher Education and Teaching", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:127",
'hierarchy' =>"Teacher Education and Professional Development",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:685",
'title' =>"Hindu Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:686",
'title' =>"History of Christianity", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:687",
'title' =>"History of Gender", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:688",
'title' =>"History of Philosophy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:689",
'title' =>"History of Religion", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:69",
'title' =>"Agribusiness", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:690",
'title' =>"History of Religions of Eastern Origins", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:691",
'title' =>"History of Religions of Western Origin", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:692",
'title' =>"History of Science, Technology, and Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:693",
'title' =>"History of the Pacific Islands", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:694",
'title' =>"Hormones, Hormone Substitutes, and Hormone Antagonists", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:695",
'title' =>"Horticulture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:284",
'hierarchy' =>"Plant Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:696",
'title' =>"Human and Clinical Nutrition", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:281",
'hierarchy' =>"Nutrition",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:697",
'title' =>"Human Ecology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:698",
'title' =>"Human Geography", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:329",
'hierarchy' =>"Geography",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:699",
'title' =>"Hydraulic Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:134",
'hierarchy' =>"Civil and Environmental Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:7",
'title' =>"Life Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"NULL",
'hierarchy' =>"NULL",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:70",
'title' =>"Arts Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:700",
'title' =>"Hydrology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:701",
'title' =>"Illustration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:702",
'title' =>"Immune System Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:703",
'title' =>"Immunity", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:275",
'hierarchy' =>"Immunology and Infectious Disease",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:704",
'title' =>"Immunology of Infectious Disease", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:275",
'hierarchy' =>"Immunology and Infectious Disease",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:705",
'title' =>"Immunopathology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:275",
'hierarchy' =>"Immunology and Infectious Disease",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:706",
'title' =>"Immunoprophylaxis and Therapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:275",
'hierarchy' =>"Immunology and Infectious Disease",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:707",
'title' =>"Income Distribution", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:708",
'title' =>"Indo-European Linguistics and Philology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:30",
'hierarchy' =>"Classics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:709",
'title' =>"Industrial and Organizational Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:71",
'title' =>"Business Administration, Management, and Operations", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:710",
'title' =>"Industrial and Product Design", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:711",
'title' =>"Industrial Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:145",
'hierarchy' =>"Operations Research, Systems Engineering and Industrial Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:712",
'title' =>"Industrial Organization", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:713",
'title' =>"Industrial Technology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:145",
'hierarchy' =>"Operations Research, Systems Engineering and Industrial Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:714",
'title' =>"Inequality and Stratification", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:715",
'title' =>"Infectious Disease", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:716",
'title' =>"Influenza Humans", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:717",
'title' =>"Influenza Virus Vaccines", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:718",
'title' =>"Information Literacy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:334",
'hierarchy' =>"Library and Information Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:719",
'title' =>"Infrastructure", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:72",
'title' =>"Business and Corporate Communications", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:720",
'title' =>"Inorganic Chemicals", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:721",
'title' =>"Inorganic Chemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:314",
'hierarchy' =>"Chemistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:722",
'title' =>"Institutional and Historical", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:723",
'title' =>"Instrumentation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:313",
'hierarchy' =>"Astrophysics and Astronomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:724",
'title' =>"Integrative Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:267",
'hierarchy' =>"Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:725",
'title' =>"Integrative Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:726",
'title' =>"Integumentary System", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:727",
'title' =>"Intellectual History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:728",
'title' =>"Interactive Arts", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:729",
'title' =>"Interdisciplinary Arts and Media", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:73",
'title' =>"Business Intelligence", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:730",
'title' =>"Internal Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:731",
'title' =>"International and Community Nutrition", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:281",
'hierarchy' =>"Nutrition",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:732",
'title' =>"International and Comparative Labor Relations", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:84",
'hierarchy' =>"Labor Relations",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:733",
'title' =>"International and Intercultural Communication", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:734",
'title' =>"International Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:735",
'title' =>"International Public Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:736",
'title' =>"International Relations", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:337",
'hierarchy' =>"Political Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:737",
'title' =>"Interpersonal and Small Group Communication", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:738",
'title' =>"Investigative Techniques", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:286",
'hierarchy' =>"Analytical, Diagnostic and Therapeutic Techniques and Equipment",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:739",
'title' =>"Islamic Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:74",
'title' =>"Business Law, Public Responsibility, and Ethics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:740",
'title' =>"Islamic World and Near East History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:741",
'title' =>"Italian Linguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:345",
'hierarchy' =>"Italian Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:742",
'title' =>"Italian Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:345",
'hierarchy' =>"Italian Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:743",
'title' =>"Japanese Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:35",
'hierarchy' =>"East Asian Languages and Societies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:744",
'title' =>"Journalism Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:745",
'title' =>"Junior High, Intermediate, Middle School Education and Teaching", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:127",
'hierarchy' =>"Teacher Education and Professional Development",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:746",
'title' =>"Kinesiotherapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:308",
'hierarchy' =>"Rehabilitation and Therapy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:747",
'title' =>"Korean Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:35",
'hierarchy' =>"East Asian Languages and Societies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:748",
'title' =>"Labor Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:749",
'title' =>"Labor History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:75",
'title' =>"Corporate Finance", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:750",
'title' =>"Language Description and Documentation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:751",
'title' =>"Large or Food Animal and Equine Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:311",
'hierarchy' =>"Veterinary Medicine",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:752",
'title' =>"Latin American History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:753",
'title' =>"Latin American Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:63",
'hierarchy' =>"Spanish and Portuguese Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:754",
'title' =>"Latin American Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:330",
'hierarchy' =>"International and Area Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:755",
'title' =>"Latina/o Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:55",
'hierarchy' =>"Race, Ethnicity and Post-Colonial Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:756",
'title' =>"Legal", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:757",
'title' =>"Legal Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:332",
'hierarchy' =>"Legal Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:758",
'title' =>"Lesbian, Gay, Bisexual, and Transgender Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:38",
'hierarchy' =>"Feminist, Gender, and Sexuality Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:759",
'title' =>"Linguistic Anthropology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:324",
'hierarchy' =>"Anthropology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:76",
'title' =>"E-Commerce", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:760",
'title' =>"Lipids", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:761",
'title' =>"Literature in English, Anglophone outside British Isles and North America", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:36",
'hierarchy' =>"English Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:762",
'title' =>"Literature in English, British Isles", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:36",
'hierarchy' =>"English Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:763",
'title' =>"Literature in English, North America", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:36",
'hierarchy' =>"English Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:764",
'title' =>"Literature in English, North America, Ethnic and Cultural Minority", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:36",
'hierarchy' =>"English Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:765",
'title' =>"Liturgy and Worship", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:766",
'title' =>"Logic and Foundations", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:318",
'hierarchy' =>"Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:767",
'title' =>"Logic and Foundations of Mathematics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:768",
'title' =>"Longitudinal Data Analysis and Time Series", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:769",
'title' =>"Macroeconomics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:77",
'title' =>"Entrepreneurial and Small Business Operations", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:770",
'title' =>"Macromolecular Substances", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:771",
'title' =>"Maintenance Technology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:130",
'hierarchy' =>"Aviation",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:772",
'title' =>"Male Urogenital Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:773",
'title' =>"Management and Operations", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:130",
'hierarchy' =>"Aviation",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:774",
'title' =>"Manufacturing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:141",
'hierarchy' =>"Mechanical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:775",
'title' =>"Marriage and Family Therapy and Counseling", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:300",
'hierarchy' =>"Mental and Social Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:776",
'title' =>"Mass Communication", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:777",
'title' =>"Materials Chemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:314",
'hierarchy' =>"Chemistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:778",
'title' =>"Maternal and Child Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:779",
'title' =>"Maternal, Child Health and Neonatal Nursing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:302",
'hierarchy' =>"Nursing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:78",
'title' =>"Fashion Business", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:780",
'title' =>"Meat Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:263",
'hierarchy' =>"Animal Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:781",
'title' =>"Mechanics of Materials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:139",
'hierarchy' =>"Engineering Science and Materials",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:782",
'title' =>"Medical Anatomy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:783",
'title' =>"Medical Biochemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:784",
'title' =>"Medical Biomathematics and Biometrics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:785",
'title' =>"Medical Biophysics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:786",
'title' =>"Medical Biotechnology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:787",
'title' =>"Medical Cell Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:788",
'title' =>"Medical Genetics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:789",
'title' =>"Medical Immunology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:79",
'title' =>"Finance and Financial Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:790",
'title' =>"Medical Microbiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:791",
'title' =>"Medical Molecular Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:792",
'title' =>"Medical Neurobiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:793",
'title' =>"Medical Nutrition", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:794",
'title' =>"Medical Pathology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:795",
'title' =>"Medical Pharmacology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:796",
'title' =>"Medical Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:797",
'title' =>"Medical Toxicology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:798",
'title' =>"Medicinal and Pharmaceutical Chemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:305",
'hierarchy' =>"Pharmacy and Pharmaceutical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:799",
'title' =>"Medicinal Chemistry and Pharmaceutics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:282",
'hierarchy' =>"Pharmacology, Toxicology and Environmental Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:8",
'title' =>"Medicine and Health Sciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"NULL",
'hierarchy' =>"NULL",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:80",
'title' =>"Hospitality Administration and Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:800",
'title' =>"Medicinal-Pharmaceutical Chemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:314",
'hierarchy' =>"Chemistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:801",
'title' =>"Medicine and Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:802",
'title' =>"Medieval History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:803",
'title' =>"Melanesian Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:53",
'hierarchy' =>"Pacific Islands Languages and Societies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:804",
'title' =>"Membrane Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:133",
'hierarchy' =>"Chemical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:805",
'title' =>"Mental Disorders", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:306",
'hierarchy' =>"Psychiatry and Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:806",
'title' =>"Mesomycetozoea", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:304",
'hierarchy' =>"Organisms",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:807",
'title' =>"Metal and Jewelry Arts", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:808",
'title' =>"Metallurgy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:140",
'hierarchy' =>"Materials Science and Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:809",
'title' =>"Metaphysics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:81",
'title' =>"Human Resources Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:810",
'title' =>"Meteorology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:319",
'hierarchy' =>"Oceanography and Atmospheric Sciences and Meteorology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:811",
'title' =>"Microarrays", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:812",
'title' =>"Microbial Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:279",
'hierarchy' =>"Microbiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:813",
'title' =>"Micronesian Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:53",
'hierarchy' =>"Pacific Islands Languages and Societies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:814",
'title' =>"Military History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:815",
'title' =>"Military Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:816",
'title' =>"Mineral Physics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:817",
'title' =>"Missions and World Christianity", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:818",
'title' =>"Models and Methods", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:337",
'hierarchy' =>"Political Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:819",
'title' =>"Modern Art and Architecture", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:44",
'hierarchy' =>"History of Art, Architecture, and Archaeology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:82",
'title' =>"Insurance", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:820",
'title' =>"Molecular and Cellular Neuroscience", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:280",
'hierarchy' =>"Neuroscience and Neurobiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:821",
'title' =>"Molecular Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:264",
'hierarchy' =>"Biochemistry, Biophysics, and Structural Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:822",
'title' =>"Molecular Genetics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:274",
'hierarchy' =>"Genetics and Genomics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:823",
'title' =>"Molecular, Cellular, and Tissue Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:131",
'hierarchy' =>"Biomedical Engineering and Bioengineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:824",
'title' =>"Molecular, Genetic, and Biochemical Nutrition", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:281",
'hierarchy' =>"Nutrition",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:825",
'title' =>"Mormon Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:826",
'title' =>"Morphology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:827",
'title' =>"Motor Control", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:276",
'hierarchy' =>"Kinesiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:828",
'title' =>"Movement and Mind-Body Therapies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:308",
'hierarchy' =>"Rehabilitation and Therapy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:829",
'title' =>"Multi-Vehicle Systems and Air Traffic Control", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:128",
'hierarchy' =>"Aerospace Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:83",
'title' =>"International Business", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:830",
'title' =>"Multicultural Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:831",
'title' =>"Multivariate Analysis", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:832",
'title' =>"Musculoskeletal Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:833",
'title' =>"Musculoskeletal System", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:834",
'title' =>"Musculoskeletal, Neural, and Ocular Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:835",
'title' =>"Music Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:51",
'hierarchy' =>"Music",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:836",
'title' =>"Music Pedagogy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:51",
'hierarchy' =>"Music",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:837",
'title' =>"Music Performance", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:51",
'hierarchy' =>"Music",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:838",
'title' =>"Music Practice", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:51",
'hierarchy' =>"Music",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:839",
'title' =>"Music Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:51",
'hierarchy' =>"Music",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:84",
'title' =>"Labor Relations", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:840",
'title' =>"Music Therapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:51",
'hierarchy' =>"Music",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:841",
'title' =>"Musicology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:51",
'hierarchy' =>"Music",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:842",
'title' =>"Nanomedicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:301",
'hierarchy' =>"Nanotechnology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:843",
'title' =>"Nanotechnology Fabrication", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:137",
'hierarchy' =>"Electrical and Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:844",
'title' =>"Native American Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:55",
'hierarchy' =>"Race, Ethnicity and Post-Colonial Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:845",
'title' =>"Natural Products Chemistry and Pharmacognosy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:305",
'hierarchy' =>"Pharmacy and Pharmaceutical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:846",
'title' =>"Natural Resource Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:317",
'hierarchy' =>"Environmental Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:847",
'title' =>"Natural Resources and Conservation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:317",
'hierarchy' =>"Environmental Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:848",
'title' =>"Natural Resources Management and Policy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:317",
'hierarchy' =>"Environmental Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:849",
'title' =>"Nature and Society Relations", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:329",
'hierarchy' =>"Geography",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:85",
'title' =>"Management Information Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:850",
'title' =>"Navigation, Guidance, Control and Dynamics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:128",
'hierarchy' =>"Aerospace Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:851",
'title' =>"Near and Middle Eastern Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:330",
'hierarchy' =>"International and Area Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:852",
'title' =>"Neoplasms", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:853",
'title' =>"Nephrology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:854",
'title' =>"Nervous System", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:855",
'title' =>"Nervous System Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:856",
'title' =>"Neurology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:857",
'title' =>"Neurosciences", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:858",
'title' =>"New Religious Movements", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:859",
'title' =>"Non-linear Dynamics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:312",
'hierarchy' =>"Applied Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:86",
'title' =>"Management Sciences and Quantitative Methods", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:860",
'title' =>"Nonfiction", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:32",
'hierarchy' =>"Creative Writing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:861",
'title' =>"Nuclear", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:320",
'hierarchy' =>"Physics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:862",
'title' =>"Nucleic Acids, Nucleotides, and Nucleosides", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:863",
'title' =>"Number Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:318",
'hierarchy' =>"Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:864",
'title' =>"Numerical Analysis and Computation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:312",
'hierarchy' =>"Applied Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:865",
'title' =>"Numerical Analysis and Scientific Computing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:315",
'hierarchy' =>"Computer Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:866",
'title' =>"Nursing Administration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:302",
'hierarchy' =>"Nursing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:867",
'title' =>"Nursing Midwifery", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:302",
'hierarchy' =>"Nursing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:868",
'title' =>"Nutritional and Metabolic Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:869",
'title' =>"Nutritional Epidemiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:281",
'hierarchy' =>"Nutrition",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:87",
'title' =>"Marketing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:870",
'title' =>"Obstetrics and Gynecology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:871",
'title' =>"Occupational and Environmental Health Nursing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:302",
'hierarchy' =>"Nursing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:872",
'title' =>"Occupational Health and Industrial Hygiene", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:873",
'title' =>"Occupational Therapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:308",
'hierarchy' =>"Rehabilitation and Therapy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:874",
'title' =>"Ocean Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:141",
'hierarchy' =>"Mechanical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:875",
'title' =>"Oceanography", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:319",
'hierarchy' =>"Oceanography and Atmospheric Sciences and Meteorology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:876",
'title' =>"Oil, Gas, and Energy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:317",
'hierarchy' =>"Environmental Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:877",
'title' =>"Oncology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:878",
'title' =>"Operational Research", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:145",
'hierarchy' =>"Operations Research, Systems Engineering and Industrial Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:879",
'title' =>"Ophthalmology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:88",
'title' =>"Nonprofit Administration and Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:880",
'title' =>"Optics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:320",
'hierarchy' =>"Physics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:881",
'title' =>"Oral and Maxillofacial Surgery", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:291",
'hierarchy' =>"Dentistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:882",
'title' =>"Oral Biology and Oral Pathology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:291",
'hierarchy' =>"Dentistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:883",
'title' =>"Oral History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:884",
'title' =>"Ordinary Differential Equations and Applied Dynamics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:312",
'hierarchy' =>"Applied Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:885",
'title' =>"Organic Chemicals", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:886",
'title' =>"Organic Chemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:314",
'hierarchy' =>"Chemistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:887",
'title' =>"Organismal Biological Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:279",
'hierarchy' =>"Microbiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:888",
'title' =>"Organizational Communication", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:889",
'title' =>"Ornithology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:263",
'hierarchy' =>"Animal Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:89",
'title' =>"Operations and Supply Chain Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:890",
'title' =>"Orthodontics and Orthodontology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:291",
'hierarchy' =>"Dentistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:891",
'title' =>"Orthopedics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:892",
'title' =>"Orthotics and Prosthetics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:308",
'hierarchy' =>"Rehabilitation and Therapy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:893",
'title' =>"OS and Networks", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:315",
'hierarchy' =>"Computer Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:894",
'title' =>"Osteopathic Medicine and Osteopathy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:895",
'title' =>"Otolaryngology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:896",
'title' =>"Otorhinolaryngologic Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:897",
'title' =>"Pain Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:898",
'title' =>"Painting", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:899",
'title' =>"Paleobiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:9",
'title' =>"Physical Sciences and Mathematics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"NULL",
'hierarchy' =>"NULL",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:90",
'title' =>"Organizational Behavior and Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:900",
'title' =>"Paleontology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:316",
'hierarchy' =>"Earth Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:901",
'title' =>"Palliative Care", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:902",
'title' =>"Parasitic Diseases", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:903",
'title' =>"Parasitology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:275",
'hierarchy' =>"Immunology and Infectious Disease",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:904",
'title' =>"Partial Differential Equations", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:312",
'hierarchy' =>"Applied Mathematics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:905",
'title' =>"Pathogenic Microbiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:279",
'hierarchy' =>"Microbiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:906",
'title' =>"Pathological Conditions, Signs and Symptoms", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:293",
'hierarchy' =>"Diseases",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:907",
'title' =>"Pathology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:908",
'title' =>"Peace and Conflict Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:909",
'title' =>"Pediatric Dentistry and Pedodontics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:291",
'hierarchy' =>"Dentistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:91",
'title' =>"Portfolio and Security Analysis", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:910",
'title' =>"Pediatric Nursing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:302",
'hierarchy' =>"Nursing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:911",
'title' =>"Pediatrics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:912",
'title' =>"Performance Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:81",
'hierarchy' =>"Human Resources Management",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:913",
'title' =>"Performance Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:66",
'hierarchy' =>"Theatre and Performance Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:914",
'title' =>"Periodontics and Periodontology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:291",
'hierarchy' =>"Dentistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:915",
'title' =>"Perioperative, Operating Room and Surgical Nursing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:302",
'hierarchy' =>"Nursing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:916",
'title' =>"Personality and Social Contexts", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:917",
'title' =>"Petroleum Engineering", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:133",
'hierarchy' =>"Chemical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:918",
'title' =>"Pharmaceutical Preparations", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:919",
'title' =>"Pharmaceutics and Drug Design", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:305",
'hierarchy' =>"Pharmacy and Pharmaceutical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:92",
'title' =>"Real Estate", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:920",
'title' =>"Pharmacoeconomics and Pharmaceutical Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:305",
'hierarchy' =>"Pharmacy and Pharmaceutical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:921",
'title' =>"Pharmacology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:282",
'hierarchy' =>"Pharmacology, Toxicology and Environmental Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:922",
'title' =>"Pharmacy Administration, Policy and Regulation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:305",
'hierarchy' =>"Pharmacy and Pharmaceutical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:923",
'title' =>"Philosophy of Language", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:924",
'title' =>"Philosophy of Mind", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:925",
'title' =>"Philosophy of Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:54",
'hierarchy' =>"Philosophy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:926",
'title' =>"Phonetics and Phonology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:927",
'title' =>"Physical and Environmental Geography", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:329",
'hierarchy' =>"Geography",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:928",
'title' =>"Physical Chemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:314",
'hierarchy' =>"Chemistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:929",
'title' =>"Physical Processes", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:313",
'hierarchy' =>"Astrophysics and Astronomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:93",
'title' =>"Recreation Business", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:930",
'title' =>"Physical Therapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:308",
'hierarchy' =>"Rehabilitation and Therapy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:931",
'title' =>"Physiological Processes", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:932",
'title' =>"Physiotherapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:308",
'hierarchy' =>"Rehabilitation and Therapy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:933",
'title' =>"Place and Environment", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:934",
'title' =>"Plant Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:284",
'hierarchy' =>"Plant Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:935",
'title' =>"Plant Breeding and Genetics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:284",
'hierarchy' =>"Plant Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:936",
'title' =>"Plant Pathology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:284",
'hierarchy' =>"Plant Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:937",
'title' =>"Plants", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:304",
'hierarchy' =>"Organisms",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:938",
'title' =>"Plasma and Beam Physics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:320",
'hierarchy' =>"Physics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:939",
'title' =>"Plastic Surgery", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:94",
'title' =>"Sales and Merchandising", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:940",
'title' =>"Playwriting", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:66",
'hierarchy' =>"Theatre and Performance Studies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:941",
'title' =>"Podiatry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:942",
'title' =>"Poetry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:32",
'hierarchy' =>"Creative Writing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:943",
'title' =>"Policy Design, Analysis, and Evaluation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:944",
'title' =>"Policy History, Theory, and Methods", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:945",
'title' =>"Political Economy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:946",
'title' =>"Political History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:947",
'title' =>"Political Theory", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:337",
'hierarchy' =>"Political Science",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:948",
'title' =>"Politics and Social Change", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:949",
'title' =>"Polycyclic Compounds", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:289",
'hierarchy' =>"Chemicals and Drugs",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:95",
'title' =>"Sports Management", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:950",
'title' =>"Polymer and Organic Materials", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:140",
'hierarchy' =>"Materials Science and Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:951",
'title' =>"Polymer Chemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:314",
'hierarchy' =>"Chemistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:952",
'title' =>"Polymer Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:133",
'hierarchy' =>"Chemical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:953",
'title' =>"Polynesian Studies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:53",
'hierarchy' =>"Pacific Islands Languages and Societies",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:954",
'title' =>"Population Biology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:270",
'hierarchy' =>"Ecology and Evolutionary Biology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:955",
'title' =>"Portuguese Literature", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:63",
'hierarchy' =>"Spanish and Portuguese Language and Literature",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:956",
'title' =>"Poultry or Avian Science", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:263",
'hierarchy' =>"Animal Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:957",
'title' =>"Power and Energy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:137",
'hierarchy' =>"Electrical and Computer Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:958",
'title' =>"Practical Theology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:959",
'title' =>"Pre-Elementary, Early Childhood, Kindergarten Teacher Education", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:127",
'hierarchy' =>"Teacher Education and Professional Development",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:96",
'title' =>"Strategic Management Policy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:960",
'title' =>"Preventive Medicine", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:961",
'title' =>"Primary Care", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:962",
'title' =>"Printmaking", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:24",
'hierarchy' =>"Art and Design",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:963",
'title' =>"Probability", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:321",
'hierarchy' =>"Statistics and Probability",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:964",
'title' =>"Process Control and Systems", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:133",
'hierarchy' =>"Chemical Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:965",
'title' =>"Programming Languages and Compilers", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:315",
'hierarchy' =>"Computer Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:966",
'title' =>"Propulsion and Power", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:128",
'hierarchy' =>"Aerospace Engineering",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:967",
'title' =>"Prosthodontics and Prosthodontology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:291",
'hierarchy' =>"Dentistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:968",
'title' =>"Psychiatric and Mental Health", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:300",
'hierarchy' =>"Mental and Social Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:969",
'title' =>"Psychiatric and Mental Health Nursing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:302",
'hierarchy' =>"Nursing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:97",
'title' =>"Taxation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:970",
'title' =>"Psychiatry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:971",
'title' =>"Psychoanalysis and Psychotherapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:300",
'hierarchy' =>"Mental and Social Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:972",
'title' =>"Psycholinguistics and Neurolinguistics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:335",
'hierarchy' =>"Linguistics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:973",
'title' =>"Psychological Phenomena and Processes", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:306",
'hierarchy' =>"Psychiatry and Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:974",
'title' =>"Psychology of Movement", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:276",
'hierarchy' =>"Kinesiology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:975",
'title' =>"Public Administration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:976",
'title' =>"Public Affairs", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:977",
'title' =>"Public Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:978",
'title' =>"Public Health and Community Nursing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:302",
'hierarchy' =>"Nursing",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:979",
'title' =>"Public Health Education and Promotion", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:307",
'hierarchy' =>"Public Health",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:98",
'title' =>"Technology and Innovation", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:980",
'title' =>"Public History", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:43",
'hierarchy' =>"History",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:981",
'title' =>"Public Policy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:982",
'title' =>"Public Relations and Advertising", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:983",
'title' =>"Publishing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:325",
'hierarchy' =>"Communication",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:984",
'title' =>"Pulmonology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:985",
'title' =>"Quantitative Psychology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:338",
'hierarchy' =>"Psychology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:986",
'title' =>"Quantitative, Qualitative, Comparative, and Historical Methodologies", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:987",
'title' =>"Quantum Physics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:320",
'hierarchy' =>"Physics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:988",
'title' =>"Race and Ethnicity", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:989",
'title' =>"Radiochemistry", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:314",
'hierarchy' =>"Chemistry",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:99",
'title' =>"Tourism and Travel", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:3",
'hierarchy' =>"Business",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:990",
'title' =>"Radiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:299",
'hierarchy' =>"Medical Specialties",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:991",
'title' =>"Recreation, Parks and Tourism Administration", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:339",
'hierarchy' =>"Public Affairs, Public Policy and Public Administration",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:992",
'title' =>"Recreational Therapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:308",
'hierarchy' =>"Rehabilitation and Therapy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:993",
'title' =>"Regional Economics", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:327",
'hierarchy' =>"Economics",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:994",
'title' =>"Regional Sociology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:343",
'hierarchy' =>"Sociology",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:995",
'title' =>"Religious Thought, Theology and Philosophy of Religion", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:58",
'hierarchy' =>"Religion",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:996",
'title' =>"Remote Sensing", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:329",
'hierarchy' =>"Geography",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:997",
'title' =>"Reproductive and Urinary Physiology", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:298",
'hierarchy' =>"Medical Sciences",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:998",
'title' =>"Respiratory System", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:287",
'hierarchy' =>"Anatomy",
'count' => '0' 
]);

Interest::create([
'attribute_id' =>"research:999",
'title' =>"Respiratory Therapy", 
'short_name' => 'NULL' ,
'parent_attribute_id' =>"research:308",
'hierarchy' =>"Rehabilitation and Therapy",
'count' => '0' 
]);

    }
}
