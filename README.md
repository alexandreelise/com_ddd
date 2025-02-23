# Component - DDD

![visitor badge](https://visitor-badge.laobi.icu/badge?page_id=alexandreelise.com_ddd&style=flat&format=true)
![GitHub followers](https://img.shields.io/github/followers/alexandreelise?style=flat)
![YouTube Channel Views](https://img.shields.io/youtube/channel/views/UCCya8rIL-PVHm8Mt4QPW-xw?style=flat&label=YouTube%20%40Api%20Adept%20vues)


<pre>

    __  __     ____         _____                              __                      __              
   / / / ___  / / ____     / ___/__  ______  ___  _____       / ____  ____  ____ ___  / ___  __________
  / /_/ / _ \/ / / __ \    \__ \/ / / / __ \/ _ \/ ___/  __  / / __ \/ __ \/ __ `__ \/ / _ \/ ___/ ___/
 / __  /  __/ / / /_/ /   ___/ / /_/ / /_/ /  __/ /     / /_/ / /_/ / /_/ / / / / / / /  __/ /  (__  ) 
/_/ /_/\___/_/_/\____/   /____/\__,_/ .___/\___/_/      \____/\____/\____/_/ /_/ /_/_/\___/_/  /____/  
                                   /_/                                                                 


</pre>

> ![GitHub Repo stars](https://img.shields.io/github/stars/alexandreelise/com_ddd?style=flat) ![GitHub forks](https://img.shields.io/github/forks/alexandreelise/com_ddd?style=flat) ![GitHub watchers](https://img.shields.io/github/watchers/alexandreelise/com_ddd?style=flat)

> Example Component using Domain-driven Design and Hexagonal Architecture principles and recommandations based on what have learned by reading DDD related books, watching YouTube videos and conferences about DDD and hexagonal architecture specifically applied to PHP and also some developer focused podcasts on this topic.

## DISCLAIMER:
> This repo is more or less like a folder structure to ease the use of "DDD" and "Hexagonal Architecture" also known as "Ports and Adapters" applied to Joomla component. In other words, I'm constantly learning every day new stuff, mainly about tech and here, I share what I've learned about Domain-driven Design applied to Joomla custom component development

## HOW IT WORKS:
There are mainly 3 layers :
 - **3** - _Infrastructure_  : Code specific to your favorite CMS (Drupal,Joomla,TYPO3,WordPress,etc...)
 - **2** - _Application_     : Code where you put Interfaces of Repository pattern, Clock Service to alter time
 - **1** - _Domain_  : Code of your Value Objects, your Entities and your Business Rules specific to your Domain

I would like to add 2 more layers which are "horizontal layers" that can be used cross layers on all other layers
 - **B** - _Libraries_  : PHP Libraries for example from packagist.org
 - **A** - _Internal_   : PHP Core (or any language used by your component. It's the foundation on everything else depends)

## SUMMARY:
> Basically a layer **MAY** depend on itself and/or **lower** layers

## EXAMPLE USE CASE: You own a Digital Marketing Agency
> You want to be able to publish your content simultanuously on Drupal, Joomla, TYPO3 and WordPress because
> that's what your VIP clients use. So you hire a team of 6 developers aware of DDD best practices. One of them used Joomla and stumbled on this article. How would these principles apply in real life for your agency?

- **3**: _Infrastructure_
    - **Drupal**
      - Drupal specific code implementing Application layer code and/or using Domain layer code
    - **Joomla**
      - Joomla specific code implementing Application layer code and/or using Domain layer code
    - **TYPO3**
      - TYPO3 specific code implementing Application layer code and/or using Domain layer code
    - **WordPress**
      - WordPress specific code implementing Application layer code and/or using Domain layer code
    - Your favorite CMS and/or Framework here
      - CMS and/or Framework specific code implementing Application layer code and/or using Domain layer code


- **2**: _Application_:
    - **VIPClient**
      - VIPClientRepositoryInterface
      - VIPClientRepositoryServiceInterface
      - ...
    - **ClockInterface** (Could use PSR-20 from Libraries "horizontal" layer)

- **1**:  _Domain_
  - **BusinessRules**
     - DeployArticlesToVIPClientsOnly
     - ...
  - **Common**
     - AbstractValueObject
     - Name
     - Company
     - Role
     - ...
  - **VIPClient**
     - Reward
     - LifetimeCustomerValue
     - ...
  - ...

- **B** : _Libraries layer_
  - composer packages, npm packages, ...
- **A** : _Internal layer_
  - PHP Core (the language), Javascript (the language), etc...


### NOTE:
>There are no Tests  folder in this repo with all kinds of tests:
**Isolation Tests**, **Integration Tests**, **Smoke Tests**, **Benchmark Tests**, **Security Tests**, etc...
>
>Because I wanted in this repo to focus on folder structure of how to use DDD when coding your own custom Joomla component.
