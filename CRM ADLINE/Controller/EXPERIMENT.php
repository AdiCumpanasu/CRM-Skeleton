SERVER MySQL

SERVER PHP (GetFromBD  Controller)

CLIENT HTML (Chrome)

JS


{
	entity,
	{ "randuri_afectate" : 1 }
}


Metagenerator

{
"entityName" : "agent",
"pageDesign" : 	{ 
					"panel" :  	{
									"title" : "Informatii aditionale",
									"controls" : [ "name", "description", "email" ]
								},
					"tipeMapping" : {
										"name" :{
													"type" : "text",
													"label" : "Numele Agentului:",
													"editable" : true
										"description" :{
													"type" : "textarea",
													"label" : "Despre:",
													"editable" : true
										"email" :{
													"type" : "text",
													"label" : "Email contact:",
													"editable" : false
												}
									}
				}